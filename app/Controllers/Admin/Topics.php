<?php 
namespace App\Controllers\Admin;

use App\Models\AdminModel;
use App\Models\SubjectModel;
use App\Models\SectionModel;
use App\Models\TopicModel;

class Topics extends \CodeIgniter\Controller
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

                $this->_subjectobj  	= new SubjectModel();
                $this->_sectionobj  	= new SectionModel();
                $this->_topicobj  		= new TopicModel();

                $this->_id              = $this->_session->get('admin_id');
        }

	public function index()
		{
			$title = $this->request->getVar('title');

			if ($title)
			$this->_topicobj->like('topic', $title);

			$topics_res  = $this->_topicobj->paginate(PAGINATION_PER_PAGE);
			$pager       = $this->_topicobj->pager;

			$currentffset   = $this->request->getVar('page') ? $this->request->getVar('page') : 1; 

			echo view('Backend/Topics/list', compact('topics_res', 'currentffset', 'pager', 'title'));
		}

	public function new()
	    {
	    	$subjects = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();

	    	$subject_id = $this->request->getVar('subject_id');

	    	$sections   = [];
	    	if($subject_id)
	    	$sections   = $this->_sectionobj->select(['id', 'section'])->orderBy('section', 'ASC')->where('subject_id', $subject_id)->get()->getResult();

			echo view('Backend/Topics/form', compact('subjects', 'sections', 'subject_id'));
	    }

	public function create()
	    {
	    	$validate = $this->validate([
							                'subject' => 'required',
							                'section' => 'required',
							                'title' => 'required|max_length[96]',
							                'slug' => 'required|max_length[96]',
							                'description' => 'required',
							                'status' => 'required',
							                'page_title' => 'required',
							                'meta_keywords' => 'required',
							                'meta_description' => 'required',
									    ],
										[   // Errors

											'subject' => [
									            'required' => 'The subject field is required',
									        ],
									        'section' => [
									            'required' => 'The section field is required',
									        ],

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
		        	$subjects   = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();

			    	$subject_id = $this->request->getVar('subject_id');

			    	$sections   = [];
			    	if($subject_id)
			    	$sections   = $this->_sectionobj->select(['id', 'section'])->orderBy('section', 'ASC')->where('subject_id', $subject_id)->get()->getResult();

		            echo view('Backend/Topics/form', [
		                  							    'validator' => $this->validator,
		                  							    'subjects' => $subjects,
		                  							    'sections' => $sections,
		                  							    'subject_id' => $subject_id
		            							     ]);
		        }
		    else
		        { 
		        	$post_array     				= $this->request->getPost();

		        	$post_array['subject_id']      	= $this->request->getVar('subject');
		        	$post_array['section_id']      	= $this->request->getVar('section');
		        	$post_array['topic']      		= $this->request->getVar('title');
		        	$post_array['slug']      		= $this->request->getVar('slug');
		        	$post_array['detail']      	    = $this->request->getVar('description');
		        	$post_array['status']           = $this->request->getVar('status');

		        	$post_array['page_title']       = $this->request->getVar('page_title');
		        	$post_array['meta_keywords']    = $this->request->getVar('meta_keywords');
		        	$post_array['meta_description'] = $this->request->getVar('meta_description');

		        	$post_array['unix_timestamp']   = time();
		        	$post_array['display']   		= 1;

		        	$id        						= $this->_topicobj->save($post_array);
		        	if ($id):
		        	    return redirect()->route('admin.topics.index')->with('saved', true);;
		        	else:
		        		return redirect()->route('admin.topics.index')->with('saved', false);
		        	endif;
		        }

	    }
	public function edit($id)
	    {
	    	$topic_arr = $this->_topicobj->where('id', $id)->first();
	    	$subjects   = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();
	    	//$sections   = $this->_sectionobj->select(['id', 'section'])->orderBy('section', 'ASC')->where('subject_id', $topic_arr['subject_id'])->get()->getResult();

	    	$sections   = $this->_sectionobj->select(['id', 'section'])->orderBy('section', 'ASC')->get()->getResult();

			echo view('Backend/Topics/edit', compact('topic_arr', 'id', 'subjects', 'sections'));
	    }

	public function update($id)
	    {
	    	 $validate = $this->validate([
							                'subject' => 'required',
							                'section' => 'required',
							                'title' => 'required|max_length[96]',
							                'slug' => 'required|max_length[96]',
							                'description' => 'required',
							                'status' => 'required',
							                'page_title' => 'required',
							                'meta_keywords' => 'required',
							                'meta_description' => 'required',
									    ],
										[   // Errors

											'subject' => [
									            'required' => 'The subject field is required',
									        ],
									        'section' => [
									            'required' => 'The section field is required',
									        ],

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
		        	$subjects   = $this->_subjectobj->select(['id', 'name'])->orderBy('name', 'ASC')->where('status', 1)->get()->getResult();

			    	$subject_id = @$this->request->getVar('subject_id');

			    	$sections   = [];
			    	if($subject_id)
			    	$sections   = $this->_sectionobj->select(['id', 'section'])->orderBy('section', 'ASC')->where('subject_id', $subject_id)->get()->getResult();

		            echo view('Backend/Topics/form', [
		                  							 	'validator' => $this->validator,
		                  							 	'id' => $id,
		                  							 	'subjects' => $subjects,
		                  							    'sections' => $sections,
		                  							    'subject_id' => $subject_id
		            							     ]);
		        }
		    else
		        { 
		        	$post_array     				= $this->request->getPost();

		        	$post_array['subject_id']      	= $this->request->getVar('subject');
		        	$post_array['section_id']      	= $this->request->getVar('section');
		        	$post_array['topic']      		= $this->request->getVar('title');
		        	$post_array['slug']      		= $this->request->getVar('slug');
		        	$post_array['detail']      	    = $this->request->getVar('description');
		        	$post_array['status']           = $this->request->getVar('status');

		        	$post_array['page_title']       = $this->request->getVar('page_title');
		        	$post_array['meta_keywords']    = $this->request->getVar('meta_keywords');
		        	$post_array['meta_description'] = $this->request->getVar('meta_description');

		        	$post_array['unix_timestamp']   = time();
		        	$post_array['display']   		= 1;

		        	try
		        	 {
		        	 	$this->_topicobj->where('id', $id)->set($post_array)->update();
		        	 	$is_success = true;
		        	 }
		        	catch(Exception $e)
		        	 {
						$is_success = false;
		        	 }

		        	if ($is_success):
		        	    return redirect()->route('admin.topics.index')->with('update', true);
		        	else:
		        		return redirect()->route('admin.topic.edit', $id)->with('update', false);
		        	endif;
		        }

	    }


	public function delete()
	    {

	    }
}
