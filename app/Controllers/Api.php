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
           return $this->response->setJson($res_arr);
      }


    public function twitter()
     {
        $settings = array(
                            'oauth_access_token' => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
                            'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
                            'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
                            'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET')
                         );

        $url            =  getenv('TWITTER_TREND_URL');
        $requestMethod  = "GET";
        $getfield       = "?id=" . getenv('TWITTER_DEFAULT_WOEID');
        $twitter        = new TwitterAPIExchange($settings);
        $json_response  = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();

        $resp           = json_decode($json_response);

        foreach($resp[0]->trends as $content):
                            $data = [];
                            $data['woeid']               = 1;
                            $data['name']                = $content->name;
                            $data['url']                 = $content->url;
                            $data['promoted_content']    = $content->promoted_content;
                            $data['query']               = $content->query;
                            $data['tweet_volume']        = $content->tweet_volume  ;
                            $data['create_time']         = time();//$content['stats'];
                            $this->_twittertrends->insert($data);

                            //echo $this->_twittertrends->getLastQuery();
        endforeach;

     }


    public function twitter_api()
     {
            $query   = "SELECT `name`, `url`, `tweet_volume` FROM `twitter_trends` WHERE `woeid` = 1";
            $db      = \Config\Database::connect();
            $results = $db->query($query);

            $res_arr = [];
            if($results->getNumRows()):
                foreach($results->getResult() as $res):
                  $res_arr[] = ['name' => $res->name, 'url' => (string) $res->url, 'tweet_volume' => (int) $res->tweet_volume];
                endforeach;
            endif;
            return $this->response->setJson(['response' => $res_arr]);
     }



    public function youtube()
        { 
            $get_file_contents  = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=snippet&chart=mostPopular&regionCode=IN&maxResults=25&key=AIzaSyDryweDU_0oHSMYPEJqBq5BsTqhGJrYb9c");
            $file_contents      = json_decode($get_file_contents);  
            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $data['yt_id']         = $content->id;
                        $data['title']         = $content->snippet->title;
                        $data['description']   = $content->snippet->description;
                        $data['thumbnails']    = json_encode($content->snippet->thumbnails);
                        $data['channel_title'] = $content->snippet->channelTitle;
                        $data['category_id']   = $content->snippet->categoryId  ;
                        $data['published_at']  = $content->snippet->publishedAt;
                        $data['stats']         = json_encode([]);//$content['stats'];
                        $data['created_at']    = time();
                        $this->_ytobj->insert($data);
                    endforeach;
                endif;
            endif;
        }

    public function youtube_stats()
        { 
            $get_file_contents  = file_get_contents("https://www.googleapis.com/youtube/v3/videos?part=statistics&chart=mostPopular&regionCode=IN&maxResults=25&key=AIzaSyDryweDU_0oHSMYPEJqBq5BsTqhGJrYb9c");
            $file_contents      = json_decode($get_file_contents);  
            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $yt_id                 = $content->id;
                        $stats                 = json_encode($content->statistics);
                        $this->_ytobj->where(['yt_id' => $yt_id])->set('stats', $stats)->update();
                    endforeach;
                endif;
            endif;
        }

    public function youtube_api()
        { 
            $code    = "IN";    
            $query   = "SELECT `title`, `description`, `thumbnails`, `channel_title`, `stats` FROM `youtube_trends` WHERE `created_at` = (SELECT `created_at` FROM `youtube_trends` ORDER BY `id` DESC LIMIT 1)";
            $db      = \Config\Database::connect();
            $results = $db->query($query);

            $res_arr = [];
            if($results->getNumRows()):
                foreach($results->getResult() as $res):
                  $thumbnail = json_decode($res->thumbnails);
                  $stats_obj = json_decode($res->stats);
                  $res_arr[] = ['title' => $res->title, 'image' => $thumbnail->default->url, 'channel_title' => $res->channel_title, 'like' => (int) @$stats_obj->likeCount, 'view' => (int)  @$stats_obj->viewCount, 'comment' => (int) @$stats_obj->commentCount, 'dislike' => (int) @$stats_obj->dislikeCount, 'favorite' => (int)  @$stats_obj->favoriteCount];
                endforeach;
            endif;
            return $this->response->setJson(['response' => $res_arr]);

        }


    public function trends($code = '')
        { 
            $code    = "IN";
            $query   = "SELECT `title`, `image`, `news_url`, `source` FROM `trends` WHERE `create_time` = (SELECT `create_time` FROM `trends` WHERE `code` = '".$code."' ORDER BY `id` DESC LIMIT 1)";
            $db      = \Config\Database::connect();
            $results = $db->query($query);

            $res_arr = [];
            if($results->getNumRows()):
                foreach($results->getResult() as $res)
                $res_arr[] = ['id' => (int) $res->id, 'title' => $res->title, 'image' => $res->image, 'news_url' => $res->news_url, 'source' => $res->source];
            endif;

            return $this->response->setJson(['response' => $res_arr]);
        }

    public function relatedTrends($trend_id = '')
        { 
            $query    = "SELECT `title`, `time_ago`, `source`, `news_url`, `image_url`, `url`, `snipped` FROM `trends_related` WHERE `trend_id` = $trend_id";
            $db       = \Config\Database::connect();
            $results  = $db->query($query);
            $res_arr  = []; 
            if($results->getNumRows()):
                foreach($results->getResult() as $res)
                $res_arr[] = ['title' => htmlspecialchars_decode($res->title), 'time_ago' => $res->time_ago, 'source' => $res->source, 'news_url' => $res->news_url,  'image_url' => $res->image_url, 'url' => $res->url, 'snipped' => $res->snipped];
            endif;
            
            return $this->response->setJson(['response' => $res_arr]);
        }

    public function subjects($slug = '')
    { 
        # This options are by default if none provided
        $code    = "IN";
        $options = [
                'hl'  => 'en-GB',
                'tz'  => -1200, # last hour
                'geo' => $code,
            ];

        $gt = new GTrends($options);
        $get_daily_search_trends = $gt->getDailySearchTrends();
        if(isset($get_daily_search_trends['default']['trendingSearchesDays']))
         {
             $trendingSearchesDays = $get_daily_search_trends['default']['trendingSearchesDays'];
             if(count($trendingSearchesDays)):
                foreach($trendingSearchesDays as $key => $trending_searches):
                 if($key == 0):
                    $date           =  $trending_searches['date'];
                    if($date):
                      $year         =  substr($date, 0, 4);
                      $month        =  substr($date, 4, 2);
                      $day          =  substr($date, 6, 2);
                      $date_format  =  mktime(0, 0, 0, $month, $day, $year);
                    endif;
                 endif;

                 foreach($trending_searches['trendingSearches'] as $trending_search_data):
                    $main_title = $trending_search_data['title']['query'] ?? '';
                    $image      = $trending_search_data['image']['imageUrl'] ?? '';
                    $news_url   = $trending_search_data['image']['newsUrl'] ?? '';
                    $source     = $trending_search_data['image']['source'] ?? '';
                    $parent_data = [
                                        'code' => $code,
                                        'date_format' => $date_format ?? NULL,
                                        'title' => $main_title,
                                        'image'    => $image,
                                        'news_url' => $news_url,
                                        'source' => $source,
                                        'create_time' => time()
                                    ];
                    $this->_trendobj->insert($parent_data);
                    $trend_id = $this->_trendobj->getInsertID();

                    if(isset($trending_search_data['articles'])):
                         if(count($trending_search_data['articles'])):
                            foreach($trending_search_data['articles'] as $key => $related_articles):

                                $title    =  $related_articles['title'] ?? '';
                                $timeAgo  =  $related_articles['timeAgo'] ?? '';
                                $source   =  $related_articles['source'] ?? '';
                                $newsUrl  =  $related_articles['image']['newsUrl'] ?? '';
                                $imageUrl =  $related_articles['image']['imageUrl'] ?? '';
                                $url      =  $related_articles['url'] ?? '';
                                $snippet  =  $related_articles['snippet'] ?? '';

                                $child_data = [
                                                'trend_id' => $trend_id,
                                                'title' => $title,
                                                'time_ago'    => $timeAgo,
                                                'source' => $source,
                                                'news_url' => $newsUrl,
                                                'image_url' => $imageUrl,
                                                'url' => $url,
                                                'snipped' => $snippet,
                                                'create_time' => time()
                                             ];
                                $this->_trend_related_obj->insert($child_data);

                            endforeach;
                        endif;
                    endif;
                endforeach;
                endforeach;
             endif;
         }


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