<?php

namespace App\Controllers;

use App\Models\SubjectModel;
use App\Models\SectionModel;
use App\Models\TopicModel;
use App\Models\TrendModel;
use App\Models\YoutubeModel;
use App\Models\TrendLocationModel;
use App\Models\TwitterTrendsModel;

use App\Models\TrendRelatedModel;

use CodeIgniter\API\ResponseTrait;
use Google\GTrends;


use App\Libraries\TwitterAPIExchange;

class Api extends BaseController
{
    protected $helpers = ['site'];

    public function __construct()
        {
            helper(['url', 'form', 'site']);

            $this->_subjectobj              = new SubjectModel();
            $this->_sectionobj              = new SectionModel();
            $this->_topicobj                = new TopicModel();
            $this->_trendobj                = new TrendModel();
            $this->_trend_related_obj       = new TrendRelatedModel();
            $this->_ytobj                   = new YoutubeModel();
            $this->_trendlocation           = new TrendLocationModel();
            $this->_twittertrends           = new TwitterTrendsModel();
        }


     public function usersJson()
      {
           $users = [["name" => "Dennis Ritchie"],["name" => "James Gosling"],["name" => "Bjarne Stroustrup"],["name" => "Brian Kernighan"],["name" => "Linus Torvalds"]];
           return $this->response->setJson($users);
      }

    public function twitter_api($country = '', $place = '')
     {
            $res_arr  = twitter_trends($country, $place);
            return $this->response->setJson(['response' => $res_arr['results']]);
     }

    public function youtube_api($alias = '')
        { 
            $res_arr  = youtube_trends_api($alias);
            return $this->response->setJson(['response' => $res_arr['results']]);
        }

    public function trends($alias = '')
        { 
            $res_arr  =  google_trends_api($alias);
            return $this->response->setJson(['response' => $res_arr['results']]);
        }

    public function subjects($slug = '')
    { 
        $subjects    =  $this->_subjectobj->select(['id', 'name', 'image'])->where('status', 1)->get();
        if($subjects->getNumRows()):
            foreach($subjects->getResult() as $res)
            $res_arr[] = ['id' => (int) $res->id, 'name' => $res->name, 'image' => $res->image];
            return $this->response->setJson(['response' => $res_arr]);
        else:
            return $this->response->setJson(['response' => '']);
        endif;
    }

    public function subjectTopics($id = '')
    { 
        $subjects    =  $this->_topicobj->select(['id', 'topic', 'slug'])->where('status', 1)->where('subject_id', $id)->orderBy('sort', 'ASC')->get();
        if($subjects->getNumRows()):
            foreach($subjects->getResult() as $res)
            $res_arr[] = ['id' => (int) $res->id, 'topic' => $res->topic, 'slug' => $res->slug];
            return $this->response->setJson(['response' => $res_arr]);
        else:
            return $this->response->setJson(['response' => '']);
        endif;
    }

    public function blogCategories()
     {
         $query   = "SELECT t.term_id AS id, t.name FROM tbl_terms t LEFT JOIN tbl_term_taxonomy tt ON t.term_id = tt.term_id WHERE tt.taxonomy = 'category' and t.name != 'Uncategorized' ORDER BY name";
         $db      = \Config\Database::connect('blog');
         $results = $db->query($query);
         foreach($results->getResult() as $res)
         $res_arr[] = ['id' => (int) $res->id, 'name' => $res->name];
         return $this->response->setJson(['response' => $res_arr]);
     }

    public function topicDetail($id = '')
     {
         $info = $this->_topicobj->select(['detail', 'topic'])->where('id', $id)->first();
         return view('Frontend/Topic_webview',compact('info'));
     }


    public function getBlogs()
     {
         $db     = \Config\Database::connect('blog');
         $blogs  = $db->table('tbl_posts')->select('ID', 'post_title')->where(['post_type' => 'post', 'post_status' => 'publish'])->orderBy('ID', 'desc')->get();
         if ($blogs->getNumRows()):
          foreach ($blogs->getResult() as $blog):
            $arr[] = ['id' => $blog->ID, 'title' => ucfirst(mb_convert_encoding($blog->post_title, 'UTF-8', 'UTF-8'))];
          endforeach;
         endif;
         echo json_encode(['response' => $arr]);
     }


     public function categoryBlogs($id = '')
     {
         if ( ! empty($id))
         $query   = "SELECT tbl_posts.ID AS id, tbl_posts.post_title AS name FROM tbl_posts LEFT JOIN tbl_term_relationships ON (tbl_posts.ID = tbl_term_relationships.object_id) LEFT JOIN tbl_term_taxonomy ON (tbl_term_relationships.term_taxonomy_id = tbl_term_taxonomy.term_taxonomy_id) WHERE tbl_term_taxonomy.term_id IN ($id) AND tbl_posts.post_status='publish' ORDER BY tbl_posts.ID DESC";
         else
          $query   = "SELECT tbl_posts.ID AS id, tbl_posts.post_title AS name FROM tbl_posts LEFT JOIN tbl_term_relationships ON (tbl_posts.ID = tbl_term_relationships.object_id) LEFT JOIN tbl_term_taxonomy ON (tbl_term_relationships.term_taxonomy_id = tbl_term_taxonomy.term_taxonomy_id) WHERE tbl_posts.post_status='publish' ORDER BY tbl_posts.ID DESC";

         $db       = \Config\Database::connect('blog');

         $results  = $db->query($query);
         
         foreach($results->getResult() as $res)
         $res_arr[] = ['id' => (int) $res->id, 'name' => $res->name];
        
         return $this->response->setJson(['response' => $res_arr]);
     }

    public function blogDetail($id = '')
     {
         $db        = \Config\Database::connect('blog');
         $info_arr  = $db->table('tbl_posts')->select(['ID', 'post_content', 'post_title'])->where('ID', $id)->limit(1)->get()->getResult();

         $pre_open   = '<pre class="brush: php; title: ; notranslate" title="">';
         $pre_close  = '</pre>';
         $content    = str_replace(array('[php]', '[/php]'), array($pre_open, $pre_close), $info_arr[0]->post_content);
         $heading    = $info_arr[0]->post_title;

         return view('Frontend/Blog_webview', compact('heading', 'content'));
     }

    /*

    public function blogDetail($id = '')
     {
         $info = DB::connection('blog')->table('tbl_posts')->select('ID', 'post_content', 'post_title')->where(['ID' => $id])->first();

         $pre_open   = '<pre class="brush: php; title: ; notranslate" title="">';
         $pre_close  = '</pre>';
         $content    = str_replace(array('[php]', '[/php]'), array($pre_open, $pre_close), $info->post_content);
         $heading    = $info->post_title;
         return view('front.pages.subject.webviewblog', compact('content', 'heading'));
     }

    public function getBlogs()
     {
         $blogs  = DB::connection('blog')->table('tbl_posts')->select('ID', 'post_title')->where(['post_type' => 'post', 'post_status' => 'publish'])->orderBy('ID', 'desc')->get()->toArray();
         if (count($blogs)):
          foreach ($blogs as $blog):
            $arr[] = ['id' => $blog->ID, 'title' => ucfirst(mb_convert_encoding($blog->post_title, 'UTF-8', 'UTF-8'))];
          endforeach;
         endif;
         return response()->json(['response' => $arr]);
     }

    public function blogCategories()
     {
         $query   = "SELECT t.term_id AS id, t.name FROM tbl_terms t LEFT JOIN tbl_term_taxonomy tt ON t.term_id = tt.term_id WHERE tt.taxonomy = 'category' and t.name != 'Uncategorized' ORDER BY name";
         $results = DB::connection('blog')->select($query);
         return response()->json(['response' => $results]);
     }

    public function categoryBlogs($id = '')
     {
         if (!empty($id))
         $query   = "SELECT tbl_posts.ID AS id, tbl_posts.post_title AS name FROM tbl_posts LEFT JOIN tbl_term_relationships ON (tbl_posts.ID = tbl_term_relationships.object_id) LEFT JOIN tbl_term_taxonomy ON (tbl_term_relationships.term_taxonomy_id = tbl_term_taxonomy.term_taxonomy_id) WHERE tbl_term_taxonomy.term_id IN ($id) AND tbl_posts.post_status='publish' ORDER BY tbl_posts.ID DESC";
         else
          $query   = "SELECT tbl_posts.ID AS id, tbl_posts.post_title AS name FROM tbl_posts LEFT JOIN tbl_term_relationships ON (tbl_posts.ID = tbl_term_relationships.object_id) LEFT JOIN tbl_term_taxonomy ON (tbl_term_relationships.term_taxonomy_id = tbl_term_taxonomy.term_taxonomy_id) WHERE tbl_posts.post_status='publish' ORDER BY tbl_posts.ID DESC";

         $results  = DB::connection('blog')->select($query);
         return response()->json(['response' => $results]);
     }

    public function feedback(Request $request)
     {
            $params = json_decode(file_get_contents('php://input'), true);

            $data   = $params['name'] . ' - ' .$params['email'] . ' - ' .substr($params['msg'], 0, 1024);

            Mail::raw($data, function ($message) {
                     $message->to('vjmail17@gmail.com');
                     $message->subject('nexladder query from app');
            });

            return response()->json(['response' => 'success']);
     }

    public function kids_play_privacy_policy()
     {
          return view('front.pages.contact.kids_play_privacy');
     }*/
}