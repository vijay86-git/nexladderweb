<?php 
namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\SectionModel;
use App\Models\SubjectModel;

class Sections extends \CodeIgniter\Controller
{
    // protected $helpers = ['url', 'form', 'site'];
    
    private $_session;
    private $_obj;
    private $_id;

    private $_user;

    public function __construct()
        {
        		$this->_session = \Config\Services::session();
                helper(['url', 'form', 'site']);
                check_admin_logged_out();

                $this->_obj  			= new AdminModel();
                $this->_sectionobj  	= new SectionModel();
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
			$this->_sectionobj->like('section', $title);

			$section_res = $this->_sectionobj->paginate(PAGINATION_PER_PAGE);
			$pager       = $this->_sectionobj->pager;

			$currentffset   = $this->request->getVar('page') ? $this->request->getVar('page') : 1; 

			echo view('Backend/Sections/list', compact('section_res', 'currentffset', 'pager', 'title'));
		}



	public function new()
	    {
	    	$subjects = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();
			echo view('Backend/Sections/form', compact('subjects'));
	    }

	public function create()
	    {
	    	$validate = $this->validate([
							                'subject' => 'required',
							                'title' => 'required|max_length[96]',
							                'sort' => 'required',
									    ],
										[   // Errors
										    'subject' => [
									            'required' => 'The subject field is required',
									        ],

									        'title' => [
									            'required' => 'The title field is required',
									        ],

									        'sort' => [
									            'required' => 'The sort field is required',
									        ],


									    ]
								);
			if ( ! $validate)
		        {
		        	$subjects = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();
		            echo view('Backend/Sections/form', [
		                  									 'validator' => $this->validator,
		                  									 'subjects' => $subjects
		            							   	   ]);
		        }
		    else
		        { 
		        	$post_array     				= $this->request->getPost();

		        	$post_array['subject_id']      	= $this->request->getVar('subject');
		        	$post_array['section']      	= $this->request->getVar('title');
		        	$post_array['sort']      	    = $this->request->getVar('sort');

		        	$post_array['unix_timestamp']   = time();
		        	$post_array['status']   		= $this->request->getVar('status');

		        	$id        						= $this->_sectionobj->save($post_array);
		        	if ($id):
		        	    return redirect()->route('admin.sections.index')->with('saved', true);;
		        	else:
		        		return redirect()->route('admin.sections.index')->with('saved', false);
		        	endif;
		        }

	    }
	public function edit($id)
	    {
	    	$section_arr = $this->_sectionobj->where('id', $id)->first();
	    	$subjects = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();
			echo view('Backend/Sections/edit', compact('section_arr', 'id', 'subjects'));
	    }

	public function update($id)
	    {
	    	 $validate = $this->validate([
							                'subject' => 'required',
							                'title' => 'required|max_length[96]',
							                'sort' => 'required',
									    ],
										[   // Errors
										    'subject' => [
									            'required' => 'The subject field is required',
									        ],

									        'title' => [
									            'required' => 'The title field is required',
									        ],

									        'sort' => [
									            'required' => 'The sort field is required',
									        ],


									    ]
								);

			if ( ! $validate)
		        {
		            echo view('Backend/Sections/form', [
		                  							 		'validator' => $this->validator,
		                  							 		'id' => $id
		            							   	   ]);
		        }
		    else
		        { 
		        	$post_array     				= $this->request->getPost();

		        	$post_array['subject_id']      	= $this->request->getVar('subject');
		        	$post_array['section']      	= $this->request->getVar('title');
		        	$post_array['sort']      	    = $this->request->getVar('sort');

		        	$post_array['unix_timestamp']   = time();
		        	$post_array['status']   		= $this->request->getVar('status');

		        	try
		        	 {
		        	 	$this->_sectionobj->where('id', $id)->set($post_array)->update();
		        	 	$is_success = true;
		        	 }
		        	catch(Exception $e)
		        	 {
						$is_success = false;
		        	 }

		        	if ($is_success):
		        	    return redirect()->route('admin.sections.index')->with('update', true);
		        	else:
		        		return redirect()->route('admin.section.edit', $id)->with('update', false);
		        	endif;
		        }

	    }


	public function delete()
	    {

	    }
}
