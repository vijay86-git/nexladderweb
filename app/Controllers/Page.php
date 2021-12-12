<?php

namespace App\Controllers;

use App\Models\SubjectModel;
use App\Models\SectionModel;
use App\Models\TopicModel;

class Page extends BaseController
{
	protected $helpers = ['site'];

	public function __construct()
        {
            helper(['url', 'form', 'site']);

            $this->_subjectobj  = new SubjectModel();
            $this->_sectionobj  = new SectionModel();
            $this->_topicobj    = new TopicModel();
        }

    
    public function cron()
	  { 
	  	 $page_title = 'Crontab Generator - Online CronJob Expression Maker';
	  	 $page_keywords = 'cron generator, cron generator online, crontab generator, crontab generator online, cron expression generator, cron job, crontab format, crontab online';
		 return view('Frontend/Pages/cron', compact('page_title', 'page_keywords'));
	  }

	public function about()
	  { 
		 return view('Frontend/Pages/about');
	  }

	public function disclaimer()
	  { 
		 return view('Frontend/Pages/disclaimer');
	  }

	public function contact_us()
	  { 
		    if ($this->request->getMethod() == "post")
			 {
				$validate = $this->validate([
												'name' => 'required|max_length[96]',
												'email' => 'required|valid_email|max_length[96]',
												'message' => 'required|max_length[500]',
											]
											);
				if ( ! $validate)
					{		
							echo view('Frontend/Pages/contact', ['validator' => $this->validator]);
					}
				else
					{ 
							$post_array     = $this->request->getPost();
							$name      		= $post_array['name'];
							$email      	= $post_array['email'];
							$message      	= $post_array['message'];
						
							return redirect()->route('contact.get')->with('contact', true);
					}
			} 
			else
			 {
				echo view('Frontend/Pages/contact');
			 }

	}

	public function sitemap()
	{ 
		 $subjects = $this->_subjectobj->select(['id', 'name', 'slug', 'image'])->where(['status', 1, 'show_nav' => 1])->get();
		 foreach($subjects->getResult() as $subject):
		   $arr['subject'] = $subject->name;
		   $arr['slug']    = $subject->slug;
		   $arr['topics']  = $this->_topicobj->where('subject_id', $subject->id)->get(); 
		   $res[]          = $arr; 
		 endforeach; 
		 return view('Frontend/Pages/sitemap', compact('res'));
	}


	public function subject($slug = '')
	{ 
		$subject    =  $this->_subjectobj->select()->where('slug', $slug)->first();
		if( ! $subject) 
		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();

		$sections   =  $this->_sectionobj->where('subject_id', $subject['id'])->get(); 

		$topic_arr  =  $this->_topicobj->orderBy('sort', 'ASC')->limit(1)->where('subject_id', $subject['id'])->first();

		$nextlink   =  null;

        $prevlink   =  null;

		return view('Frontend/Topics', compact('sections', 'slug', 'topic_arr', 'nextlink', 'prevlink'));
	}

	public function topics($slug = '', $topic_slug = '')
	{ 
		$subject   = $this->_subjectobj->select()->where('slug', $slug)->first(); 

		$sections  = $this->_sectionobj->where('subject_id', $subject['id'])->get();

		$topic_arr = $this->_topicobj->where('slug', $topic_slug)->first(); 


		/* get next previous topic from slug */

              $subject_id =  $subject['id'];
              $topic_sort =  $topic_arr['sort'];

              $nextlink   =  null;
              $nexttopic  =  null;
              $prevlink   =  null;
              $prevtopic  =  null;

              $next       =  $this->_topicobj->select(['slug', 'topic'])->where(['sort >' => $topic_sort, 'subject_id' => $subject_id])->orderBy('sort', 'asc')->limit(1)->first(); 

              if(! empty($next)):

                $nextlink  = route_to('topic.detail', $subject['slug'], $next['slug']);
                $nexttopic = $next['topic'];
              endif;

              $prev =  $this->_topicobj->select(['slug', 'topic'])->where(['sort <' => $topic_sort, 'subject_id' => $subject_id])->orderBy('sort', 'desc')->limit(1)->first(); 

              if ( ! empty($prev)):
                 $prevlink  = route_to('topic.detail', $subject['slug'], $prev['slug']);
                 $prevtopic = $prev['topic'];
               endif;

              $nextprevarr = ['nextlink' => $nextlink, 'nexttopic' => $nexttopic, 'prevlink' => $prevlink, 'prevtopic' => $prevtopic];
            
          /* end here */

		return view('Frontend/Topics', compact('sections', 'slug', 'topic_arr', 'nextprevarr'));
	}

	public function codeMirror($topic = '', $file = '')
      {
               $file = $_SERVER['DOCUMENT_ROOT'].'/codemirror/code/'.$topic.'/'.$file.'.html';
               if (file_exists($file)) { 
                    $fileinfo = pathinfo($file);
                    $text     = str_replace("-", " ", $fileinfo['filename']);
                    return view('Frontend/Codemirror', compact('file', 'text'));
               }
      }
}