<?php 
namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\SubjectModel;

class Subjects extends \CodeIgniter\Controller
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
                $this->_subjectobj  	= new SubjectModel();

                $this->_id              = $this->_session->get('admin_id');
        }

	public function index()
		{
			$title = $this->request->getVar('title');
			/*$this->campobj->select('camps.id, camps.camp_name, camps.organised_by, camps.start_date, camps.end_date, camps.unix_timestamp, cities.city, camps.upload_pic, camps.status');
			if ($camp_name)
			$this->campobj->like('camps.camp_name', $camp_name);

			$this->campobj->orderBy('camps.id', 'DESC');

			$camps_res = $this->campobj->join('cities', 'cities.id = camps.city_id')->paginate(PAGINATION_PER_PAGE);
			$pager     = $this->campobj->pager;
			*/

			if ($title)
			$this->_subjectobj->like('name', $title);

			$subject_res = $this->_subjectobj->paginate(PAGINATION_PER_PAGE);
			$pager       = $this->_subjectobj->pager;

			$currentffset   = $this->request->getVar('page') ? $this->request->getVar('page') : 1; 

			echo view('Backend/Subjects/list', compact('subject_res', 'currentffset', 'pager', 'title'));
		}

	public function new()
	    {
			echo view('Backend/Subjects/form');
	    }

	public function create()
	    {
	    	$validate = $this->validate([
							                'title' => 'required|max_length[96]',
							                'slug' => 'required|max_length[96]',
							                'description' => 'required',
							                'status' => 'required',
							                'page_title' => 'required',
							                'meta_keywords' => 'required',
							                'meta_description' => 'required',
									    ],
										[   // Errors
										    'title' => [
									            'required' => 'The title field is required',
									        ],
									        'description' => [
									            'required' => 'The description field is required',
									        ],
									        
									        'status' => [
									            'required' => 'The status field is required',
									        ],
									        
									        'page_title' => [
									            'required' => 'The page title field is required',
									        ],
									        
									        'meta_keywords' => [
									            'required' => 'The meta keywords field is required',
									        ],
									        
									        'meta_description' => [
									            'required' => 'The meta description field is required',
									        ]

									    ]
								);
			if ( ! $validate)
		        {
		            echo view('Backend/Subjects/form', [
		                  							 'validator' => $this->validator,
		            							   ]);
		        }
		    else
		        { 
		        	$post_array     = $this->request->getPost();

		        	$file      		= $this->request->getFile('logo');
					$file_name 		= $file->getName();

		        	if ($file_name)
		        		 {
		        			$file->move(ROOTPATH . 'public/uploads/subjects/', $file_name);
		        			$post_array['image']   = $file_name;
		        		 }

		        	$post_array['name']      		= $this->request->getVar('name');
		        	$post_array['slug']      		= $this->request->getVar('slug');
		        	$post_array['about']      	    = $this->request->getVar('description');
		        	$post_array['status']           = $this->request->getVar('status');
		        	$post_array['show_nav']         = $this->request->getVar('show_nav');

		        	$post_array['page_title']       = $this->request->getVar('page_title');
		        	$post_array['meta_keywords']    = $this->request->getVar('meta_keywords');
		        	$post_array['meta_description'] = $this->request->getVar('meta_description');

		        	$post_array['unix_timestamp']   = time();

		        	$id        						= $this->_subjectobj->save($post_array);
		        	if ($id):
		        	    return redirect()->route('admin.subject.index')->with('saved', true);;
		        	else:
		        		return redirect()->route('admin.subject.index')->with('saved', false);
		        	endif;
		        }

	    }
	public function edit($id)
	    {
	    	$subject_arr = $this->_subjectobj->where('id', $id)->first();
			echo view('Backend/Subjects/edit', compact('subject_arr', 'id'));
	    }

	public function update($id)
	    {
	    	 $validate = $this->validate([
							                'title' => 'required|max_length[96]',
							                'slug' => 'required|max_length[96]',
							                'description' => 'required',
							                'status' => 'required',
							                'page_title' => 'required',
							                'meta_keywords' => 'required',
							                'meta_description' => 'required',
									    ],
										[   // Errors
										    'title' => [
									            'required' => 'The title field is required',
									        ],
									        'description' => [
									            'required' => 'The description field is required',
									        ],
									        
									        'status' => [
									            'required' => 'The status field is required',
									        ],
									        
									        'page_title' => [
									            'required' => 'The page title field is required',
									        ],
									        
									        'meta_keywords' => [
									            'required' => 'The meta keywords field is required',
									        ],
									        
									        'meta_description' => [
									            'required' => 'The meta description field is required',
									        ]

									    ]
								);

			if ( ! $validate)
		        {
		            echo view('Backend/Subjects/form', [
		                  							 'validator' => $this->validator,
		                  							 'id' => $id
		            							   ]);
		        }
		    else
		        { 
		        	$post_array =   $this->request->getPost();

		        	$file      		= $this->request->getFile('logo');
					$file_name 		= $file->getName();

		        	if ($file_name)
		        		 {
		        			$file->move(ROOTPATH . 'public/uploads/subjects/', $file_name);
		        			$post_array['image']   = $file_name;
		        		 }


		        	$post_array['name']      		= $this->request->getVar('title');
		        	$post_array['slug']      		= $this->request->getVar('slug');
		        	$post_array['about']      	    = $this->request->getVar('description');
		        	$post_array['status']           = $this->request->getVar('status');
		        	$post_array['show_nav']         = $this->request->getVar('show_nav');

		        	$post_array['page_title']       = $this->request->getVar('page_title');
		        	$post_array['meta_keywords']    = $this->request->getVar('meta_keywords');
		        	$post_array['meta_description'] = $this->request->getVar('meta_description');

		        	try
		        	 {
		        	 	$this->_subjectobj->where('id', $id)->set($post_array)->update();
		        	 	$is_success = true;
		        	 }
		        	catch(Exception $e)
		        	 {
						$is_success = false;
		        	 }

		        	if ($is_success):
		        	    return redirect()->route('admin.subjects.index')->with('update', true);
		        	else:
		        		return redirect()->route('admin.subject.edit', $id)->with('update', false);
		        	endif;
		        }

	    }


	public function delete()
	    {

	    }
}
