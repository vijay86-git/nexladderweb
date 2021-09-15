<?php 
namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\ImageModel;

class Images extends \CodeIgniter\Controller
{
    // protected $helpers = ['url', 'form', 'site'];
    
    private $_session;
    private $_obj;
    private $_id;

    public function __construct()
        {
        		$this->_session = \Config\Services::session();
                helper(['url', 'form', 'site']);
                check_admin_logged_out();

                $this->_obj  			= new AdminModel();

                $this->_imageobj  		= new ImageModel();

                $this->_id              = $this->_session->get('admin_id');
        }

	public function index()
		{
			$images_res  = $this->_imageobj->orderBy('id', 'DESC')->paginate(PAGINATION_PER_PAGE);
			$pager       = $this->_imageobj->pager;

			$currentffset   = $this->request->getVar('page') ? $this->request->getVar('page') : 1; 

			echo view('Backend/Images/list', compact('images_res', 'currentffset', 'pager'));
		}

	public function create()
	    {
        	$post_array     = $this->request->getPost();
        	$file      		= $this->request->getFile('image');
			$file_name 		= $file->getName();

        	if ($file_name)
        		 {
        			$file->move(ROOTPATH . 'public/uploads/', $file_name);
        			$post_array1['image_url']   		= $file_name;
        			$post_array1['data']        		= json_encode([]);
        			$post_array1['unix_timestamp']      = time();
        			$this->_imageobj->save($post_array1);
        		 }
		        	
		    return redirect()->route('admin.images.index')->with('saved', true);;

	    }
}
