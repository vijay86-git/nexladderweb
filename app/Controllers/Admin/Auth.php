<?php namespace App\Controllers\Admin;

use App\Models\AdminModel;

class Auth extends \CodeIgniter\Controller
{
    protected $helpers = ['url', 'form'];

    private $_session;

    public function __construct()
        {
        	$this->_session = \Config\Services::session();
            helper(['url', 'form', 'site']);

            check_admin_logged_in();
        }

	public function index()
		{
			echo view('Backend/Auth/login');
		}

	public function login()
	   {
	   	    $validate = $this->validate([
							              'email' => 'required|valid_email',
							              'password'  => 'required',
									   ]);
			if ( ! $validate)
		        {
		           echo view('Backend/Auth/login', [
		                  							 'validator' => $this->validator,
		            							   ]);
		        }
		    else
		        { 
		        	$email        =   $this->request->getVar('email');
		        	$pwd          =   $this->request->getVar('password');
		        	$post_array   =   [
		                   					'email'  => $email,
		                   					'password'  => md5($pwd),
		                			  ];
		        	$model        =   new AdminModel();
		        	$response     =   $model->login($post_array);

		        	if ( ! empty($response)):
		        		$this->_session->set(['admin_id' => $response['id'], 'name' => $response['name'], 'email' => $email]);
		        	    return redirect()->route('admin.dashboard.index');
		        	else:
		        		return redirect()->route('admin.get.login')->with('login_failed', true);
		        	endif;
		        }
	   }

	public function forgotPassword()
	   {
	   	    $validate = $this->validate([
							              'email' => 'required|valid_email',
									   ]);
			if ( ! $validate)
		        {
		           echo view('Backend/Auth/forgot', [
		                  							    'validator' => $this->validator,
		            							    ]);
		        }
		    else
		        { 
		        	$email        =   $this->request->getVar('email');
		        	$post_array   =   [
		                   					'email'  => $email
		                			  ];
		        	$model        =   new AdminModel();
		        	$response     =   $model->forgot($post_array);
		        	if ($response):
		        	    return redirect()->route('admin.forgot.index')->with('forgot_msg', 1);
		        	else:
		        		return redirect()->route('admin.forgot.index')->with('forgot_msg', 2);
		        	endif;
		        }
	   }

	  public function forgot()
		{
			echo view('Backend/Auth/forgot');
		}

	//--------------------------------------------------------------------

}