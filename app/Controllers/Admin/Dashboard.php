<?php 
namespace App\Controllers\Admin;

use App\Models\AdminModel;

class Dashboard extends \CodeIgniter\Controller
{
    // protected $helpers = ['url', 'form', 'site'];
    
    private $_session;
    private $_obj;
    private $_id;

    private $_user;
    private $_camp;
    private $_sent_request;
    private $_news;

    public function __construct()
        {
        		$this->_session = \Config\Services::session();
                helper(['url', 'form', 'site']);
                check_admin_logged_out();

                $this->_obj  			= new AdminModel();

                $this->_id              = $this->_session->get('admin_id');
        }

	public function index()
		{
			$total_users = 0;//$this->_user->countAll();
			$total_camp  = 0;//$this->_camp->countAll();
			$total_sent  = 0;//$this->_sent_request->countAll();
			$total_news  = 0;//$this->_news->countAll();
			
			echo view('Backend/Dashboard/index', compact('total_users', 'total_camp', 'total_sent', 'total_news'));
		}

	public function logout()
	    {
	    	$this->_session->remove(['admin_id', 'email']);
	    	return redirect()->route('admin.get.login');
	    }

	public function profile()
		{
			$response = $this->_obj->where('id', $this->_id)->first();
			return view('Backend/Profile/profile', compact('response'));
		}

	public function update_profile()
	 {
	 		$password_validation     = [];
	    	$password_validation_msg = [];

	    	if ( ! empty($this->request->getVar('password')) OR ! empty($this->request->getVar('confirm_password')))
	    		 {
	    		 	$password_validation = [
	    		 		 						'password'  => 'required|min_length[6]',
						     		            'confirm_password'  => 'required|matches[password]'
						     		       ];
					$password_validation_msg = [
												 'confirm_password' => [
											          'required' => 'The confirm password field is required',
											          'matches' => 'The confirm password field does not match the password field'
											      ]
											   ];
	    		 }

	    	$validation_rules = [
							                'name' => 'required|max_length[64]',
							                'email'  => 'required|valid_email|max_length[64]',
								];

			$validation_rules = array_merge($validation_rules, $password_validation);

	    	$validate         = $this->validate($validation_rules, $password_validation_msg);

			if ( ! $validate)
		        {
		           $resp      = $this->_obj->where('id', $this->_id)->first();
		           echo view('Backend/profile/profile', [
		                  									 'validator' => $this->validator,
		                  									 'response'  => $resp
		            							        ]);
		        }
		    else
		        { 
		        	$post_array  = $this->request->getPost(); 

		        	unset($post_array['password']);

		        	if ( ! empty($this->request->getVar('password')))
		        	$post_array['password']  = md5($this->request->getVar('password'));

		            $this->_session->set(['name' => $this->request->getVar('name')]);

		        	$id          =   $this->_obj->where('id', $this->_id)->set($post_array)->update();
		        	return redirect()->route('admin.get.profile')->with('update', ($id ? true : false));
		        }
	 }

	//--------------------------------------------------------------------

}
