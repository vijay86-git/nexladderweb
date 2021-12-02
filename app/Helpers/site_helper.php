<?php

use Google\GTrends;

use App\Models\TrendModel;
use App\Models\TrendRelatedModel;
use App\Models\YoutubeModel;
use App\Models\TwitterTrendsModel;
use App\Libraries\TwitterAPIExchange;
use App\Models\TrendLocationModel;


if (! function_exists('check_admin_logged_in')) {
    function check_admin_logged_in() {

    	$session = \Config\Services::session();
    	if (! empty($session->admin_id))
	    	{
	    		 $route_name = route_to('admin.dashboard.index');
	    		 page_redirect($route_name);
	    	}
    }
}

if (! function_exists('check_admin_logged_out')) {
    function check_admin_logged_out() {

    	$session = \Config\Services::session();
    	if (empty($session->admin_id))
	    	{
	    		$route_name = route_to('admin.get.login');
                page_redirect($route_name);
	    	}
    }
}


if (! function_exists('page_redirect')) {
function page_redirect($uri = '', $method = 'auto', $code = NULL)
	{
		if ( ! preg_match('#^(\w+:)?//#i', $uri))
		{
			$uri = site_url($uri);
		}

		// IIS environment likely? Use 'refresh' for better compatibility
		if ($method === 'auto' && isset($_SERVER['SERVER_SOFTWARE']) && strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') !== FALSE)
		{
			$method = 'refresh';
		}
		elseif ($method !== 'refresh' && (empty($code) OR ! is_numeric($code)))
		{
			if (isset($_SERVER['SERVER_PROTOCOL'], $_SERVER['REQUEST_METHOD']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.1')
			{
				$code = ($_SERVER['REQUEST_METHOD'] !== 'GET')
					? 303	// reference: https://en.wikipedia.org/wiki/Post/Redirect/Get
					: 307;
			}
			else
			{
				$code = 302;
			}
		}

		switch ($method)
		{
			case 'refresh':
				header('Refresh:0;url='.$uri);
				break;
			default:
				header('Location: '.$uri, TRUE, $code);
				break;
		}
		exit;
	}
}



if ( ! function_exists("number_format_short")) 
  {
		function number_format_short($n, $precision = 1) {
		    if ($n < 900) {
		        // 0 - 900
		        $n_format = number_format($n, $precision);
		        $suffix = '';
		    } else if ($n < 900000) {
		        // 0.9k-850k
		        $n_format = number_format($n / 1000, $precision);
		        $suffix = 'K';
		    } else if ($n < 900000000) {
		        // 0.9m-850m
		        $n_format = number_format($n / 1000000, $precision);
		        $suffix = 'M';
		    } else if ($n < 900000000000) {
		        // 0.9b-850b
		        $n_format = number_format($n / 1000000000, $precision);
		        $suffix = 'B';
		    } else {
		        // 0.9t+
		        $n_format = number_format($n / 1000000000000, $precision);
		        $suffix = 'T';
		    }
		    // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
		    // Intentionally does not affect partials, eg "1.50" -> "1.50"
		    if ( $precision > 0 ) {
		        $dotzero = '.' . str_repeat( '0', $precision );
		        $n_format = str_replace( $dotzero, '', $n_format );
		    }
		    return $n_format . $suffix;
		}
	}





if ( ! function_exists("get_twitter_sub_location")) 
  {
     function get_twitter_sub_location($country_id = "")
      {
      		 $twittertrends  =  new TrendLocationModel();
      		 return $twittertrends->select(['id', 'country_code', 'name', 'alias'])->where(['parent_id' => $country_id])->get();
      }
  }



if ( ! function_exists("get_trending_related")) 
  {
     function get_trending_related($trend_id = "")
      {
      		$trend_related_builder  = new TrendRelatedModel();
      		$trends_res_qry         = $trend_related_builder->select(['title', 'source', 'news_url', 'image_url', 'url', 'snipped'])->where('trend_id', $trend_id)->limit(3)->get();

          if($trends_res_qry->getNumRows())
          return $trends_res_qry->getResult();
           else
          return [];
      }
  }


if ( ! function_exists("twitter_trends")) 
  {
     function twitter_trends($country = "", $place = "")
      {
      	    $twittertrends  =  new TrendLocationModel();
      	    $twitter_trends =  new TwitterTrendsModel();


      	    /* delete old records */
		    	   $current_time 				  = time();
		    	   $remain_time           = $current_time -  86400;
		   	     $twitter_trends->query("DELETE FROM `twitter_trends` WHERE `create_time` <= $remain_time");
		       /*  close */


      	    if(! empty($country) OR ! empty($place)) 
      	      {
      	      	if( ! empty($place)):
		      	    	 $loc_qry  = $twittertrends->select(['name', 'parent_id', 'woeid'])->limit(1)->where(['alias' => $place])->get();
		      	    else:
		      	    	 $loc_qry  = $twittertrends->select(['name', 'parent_id', 'woeid'])->limit(1)->where(['alias' => $country])->get();
		      	    endif;

		      	    if($loc_qry->getNumRows()):
		      	    	$loc_obj     =  $loc_qry->getRow();
		      	    	$woeid       =  $loc_obj->woeid;
		      	    	$name        =  $loc_obj->name;
		      	    	$parent_id   =  $loc_obj->parent_id;

		      	    	$sub_loc_name = '';
		      	    	if($parent_id != 1):
		      	    	 $sub_loc_qry = $twittertrends->select(['name'])->limit(1)->where(['woeid' => $parent_id, 'parent_id' => 1])->get();
		      	    	 if($sub_loc_qry->getNumRows())
		      	    	 $name        =  $name . ', ' . $sub_loc_qry->getRow()->name;
		      	     	endif;

		      	    else:
		      	    	$woeid    	  =   getenv('TWITTER_DEFAULT_WOEID');
		      	    	$name         =   "Worldwide";
		      	    endif;

		      	 }
		      	else
		      		 {
		      		 		$woeid    	  =   getenv('TWITTER_DEFAULT_WOEID');
		      	    	$name         =   "Worldwide";
		      		 }

      	    $arr['name']          =  $name;

      	    $twitter_default_sec  =  getenv('TWITTER_DEFAULT_TIME_SEC');
      	    $now                  =  time();
        		$cal_time             =  $now - $twitter_default_sec;

      	    //$trends_res_qry       =  $twitter_trends->select(['id', 'name', 'url', 'tweet_volume'])->where('create_time >=', $cal_time)->where('woeid', $woeid)->get();

      	    $trends_res_qry       =  $twitter_trends->query("SELECT `id`, `name`, `url`, `tweet_volume` FROM `twitter_trends` WHERE `create_time` = (SELECT `create_time` FROM `twitter_trends` WHERE (`woeid` = '".$woeid."' AND `create_time` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");

        	if($trends_res_qry->getNumRows()):
        	$arr['result']        =  $trends_res_qry->getResultArray();
      		return $arr;
      	    endif;

      		$settings  =       array(
			                            'oauth_access_token' => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
			                            'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
			                            'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
			                            'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET')
                         			);

	        $url            =  getenv('TWITTER_TREND_URL');
	        $requestMethod  = "GET";
	        $getfield       = "?id=" . $woeid;
	        $twitter        = new TwitterAPIExchange($settings);

	        $is_error_occured = false;
	        try
	         {
	         	$json_response    = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
	         }
	        catch(Exception $e)
	         {
	         	$is_error_occured = true;
	         }
	        
	       	$time      		  =  time();
	       	$arr['result']    =  array();

	        if( ! $is_error_occured):

		        $resp    = @json_decode($json_response);

		        if(count($resp)):
		        	foreach($resp[0]->trends as $content):
                        $data 						 = [];
                        $data['woeid']               = $woeid;
                        $data['name']                = $content->name;
                        $data['url']                 = $content->url;
                        $data['promoted_content']    = $content->promoted_content;
                        $data['query']               = $content->query;
                        $data['tweet_volume']        = $content->tweet_volume  ;
                        $data['create_time']         = $time;
                        $result[] 					 = $data;
                        $twitter_trends->insert($data);
		       		endforeach;
		       		    $arr['result'] 				 = $result;
		       	endif;

		    endif;

		    return $arr;
      }
  }

if ( ! function_exists("google_trends")) 
   {
     function google_trends($alias = "")
		    {		

					$db       		   	      = getDbObject();
					$countries              = $db->table('countries');

					$trends                 = new TrendModel();
					$trend_related_builder  = new TrendRelatedModel();

					 /* delete old records */
			    	$current_time 				  = time();
			    	$remain_time            = $current_time -  86400;
			   	  $trends->query("DELETE FROM `trends` WHERE `create_time` <= $remain_time");
			   	  $trend_related_builder->query("DELETE FROM `trends_related` WHERE `create_time` <= $remain_time");
			    /* close */


					if(empty($alias)):
					 $code        		    = getenv('GOOGLE_DEFAULT_TRENDS');
					 $title                 = "India";
					else:
					 $country_obj 			  = $countries->select(['code', 'title'])->where('alias', $alias)->get()->getRow();
					 if(isset($country_obj->code))
					 	 {
					 	 	  $code           = $country_obj->code;
							  $title          = $country_obj->title;
					 	 }
					   else
					     {
					     	return [];
					     }
					endif;

				  $data['name']       = ucwords($title);

	    		$google_default_sec = getenv('GOOGLE_DEFAULT_TIME_SEC');
	    		$now                = time();
        		$cal_time           = $now - $google_default_sec;
        		//$trends_res_qry     = $trends->select(['id', 'title', 'image', 'news_url', 'source', 'formattedTraffic'])->where('create_time >=', $cal_time)->where('code', $code)->get();

        		$trends_res_qry     = $trends->query("SELECT `id`, `title`, `image`, `news_url`, `source`, `formattedTraffic` FROM `trends` WHERE `create_time` = (SELECT `create_time` FROM `trends` WHERE (`code` = '".$code."' AND `create_time` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");

        		$data['results']   = [];
        		if($trends_res_qry->getNumRows()):
      			 $data['results']  = $trends_res_qry->getResult();
      			 return $data;
      			endif;

	        	$options = [
				                'hl'  => 'en-GB',
				                'tz'  => -1200, # last hour
				                'geo' => $code,
	            		   ];

		        $time = time();

		        try
		         {
		         	$gt   = new GTrends($options);
		        	$get_daily_search_trends = $gt->getDailySearchTrends();
		         }

		        catch(Exception $e)
		         {
		         	  $countries->where(['code' => $code])->set('google_status', 0)->update();
            		$link =  route_to('google_trends');
            		header("Location:" . $link);
            		exit;
		         }
	          	
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
		                    $formattedTraffic = $trending_search_data['formattedTraffic'] ?? '';
		                    $image      = $trending_search_data['image']['imageUrl'] ?? '';
		                    $news_url   = $trending_search_data['image']['newsUrl'] ?? '';
		                    $source     = $trending_search_data['image']['source'] ?? '';
		                    $parent_data = [
		                                        'code' => $code,
		                                        'formattedTraffic' => $formattedTraffic,
		                                        'date_format' => $date_format ?? NULL,
		                                        'title' => $main_title,
		                                        'image'    => $image,
		                                        'news_url' => $news_url,
		                                        'source' => $source,
		                                        'create_time' => $time
		                                    ];

		                    $trends->insert($parent_data);

		                    $trend_id = $trends->insertID();

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
		                                                'create_time' => $time
		                                             ];
		                                $trend_related_builder->insert($child_data);

		                            endforeach;
		                        endif;
		                    endif;
		                endforeach;
		                endforeach;
		             endif;
		    		}

		        
		        $trends_res_qry  = $trends->select(['id', 'title', 'image', 'news_url', 'source', 'formattedTraffic'])->where('create_time', $time)->where('code', $code)->get();
            if($trends_res_qry->getNumRows())
            $data['results'] = $trends_res_qry->getResult();

            return $data;
		 } 
	}


if ( ! function_exists("youtube_trends")) 
  {
     function youtube_trends($alias = "")
		{
	        $db       		   	  = getDbObject();
          $countries            = $db->table('countries');
          $ytobj             	  = new YoutubeModel();

    	    if(empty($alias)):
    			 $code        			  = getenv('GOOGLE_DEFAULT_TRENDS');
    			 $title                   = "India";
    	    else:
    			 $country_obj 			  = $countries->select(['code', 'title'])->where('alias', $alias)->get()->getRow();
    			 if(isset($country_obj->code)) {
	               $code                  = $country_obj->code;
	               $title                 = $country_obj->title;
	             }
	             else
	               	 {
	               	 	return [];
	               	 }
		    endif;

		    $data_res['name']   = ucwords($title);

    		$google_default_sec = getenv('GOOGLE_DEFAULT_TIME_SEC');
    		$now                = time();
        	$cal_time           = $now - $google_default_sec;
        	
        	//$trends_res_qry     = $ytobj->select(['id', 'yt_id', 'title', 'description', 'thumbnails', 'channel_title', 'category_id', 'stats', 'published_at'])->where('created_at >=', $cal_time)->where('code', $code)->get();

        	$trends_res_qry     = $ytobj->query("SELECT `id`, `yt_id`, `title`, `description`, `thumbnails`, `channel_title`, `category_id`, `stats`, `published_at` FROM `youtube_trends` WHERE `created_at` = (SELECT `created_at` FROM `youtube_trends` WHERE (`code` = '".$code."' AND `created_at` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");


        	/* delete old records */
		    	 $current_time 				  = time();
		    	 $remain_time            = $current_time -  86400;
		   	   $ytobj->query("DELETE FROM `youtube_trends` WHERE `created_at` <= $remain_time");
		      /*  close */


        	$data_res['results'] = [];

            if($trends_res_qry->getNumRows()):
          	$data_res['results'] = $trends_res_qry->getResult();
          	return $data_res;
          	endif;

            $time 					   =  time();

            $youtube_trend_url         =  getenv('YOUTUBE_TREND_URL');
            $youtube_trend_url_search  =  ['PART', 'CODE', 'MAX_RESULTS', 'KEY'];
            $youtube_trend_url_replace =  ['snippet', $code, getenv('MAX_RESULTS'), getenv('GOOGLE_API_KEY')];

            $youtube_trend_url         =   str_replace($youtube_trend_url_search, $youtube_trend_url_replace, $youtube_trend_url);

            $flag = 0;
            try
             {
             	$get_file_contents  	   =  file_get_contents($youtube_trend_url);
             }

            catch(Exception $e)
             {
             	$flag = 1;
             }

            if($flag):
            	$countries->where(['code' => $code])->set('youtube_status', 0)->update();
            	$link =  route_to('youtube_trends');
            	header("Location:" . $link);
            	exit;
        	endif;

		    $get_file_contents  	   =  file_get_contents($youtube_trend_url);
            $file_contents      	   =  json_decode($get_file_contents);  

            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $data['yt_id']         = $content->id;
                        $data['code']          = $code;
                        $data['title']         = $content->snippet->title;
                        $data['description']   = $content->snippet->description;
                        $data['thumbnails']    = json_encode($content->snippet->thumbnails);
                        $data['channel_title'] = $content->snippet->channelTitle;
                        $data['category_id']   = $content->snippet->categoryId  ;
                        $data['published_at']  = $content->snippet->publishedAt;
                        $data['stats']         = json_encode([]);//$content['stats'];
                        $data['created_at']    = $time;
                        $ytobj->insert($data);
                    endforeach;
                endif;
            endif;

            $youtube_trend_url         =  getenv('YOUTUBE_TREND_URL');
            $youtube_trend_url_search  =  ['PART', 'CODE', 'MAX_RESULTS', 'KEY'];
            $youtube_trend_url_replace =  ['statistics', $code, getenv('MAX_RESULTS'), getenv('GOOGLE_API_KEY')];

            $youtube_trend_url         =  str_replace($youtube_trend_url_search, $youtube_trend_url_replace, $youtube_trend_url);

            $get_file_contents 		   =  file_get_contents($youtube_trend_url);
            $file_contents      	   =  json_decode($get_file_contents);  
            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $yt_id                 = $content->id;
                        $stats                 = json_encode($content->statistics);
                        $ytobj->where(['yt_id' => $yt_id])->set('stats', $stats)->update();
                    endforeach;
                endif;
            endif;

		    $trends_res_qry     = $ytobj->select(['id', 'yt_id', 'title', 'description', 'thumbnails', 'channel_title', 'category_id', 'stats', 'published_at'])->where('created_at', $time)->where('code', $code)->get();

            if($trends_res_qry->getNumRows())
            $data_res['results'] = $trends_res_qry->getResult();

        	return $data_res;
		}
 }



if ( ! function_exists("loadAssetsFiles")) 
  {
     function loadAssetsFiles($src = null)
		    {
		         if ( ! empty(getenv('CDN_ENABLE')))
		         	return getenv('CDN_URL') . $src;
		         else
		         	return getenv('app.baseURL') . $src;
		    }
	}



if ( ! function_exists("loadLogoCodeMirror")) 
   {
     function loadLogoCodeMirror($src = null)
		    {
		         if ( ! empty(getenv('CDN_ENABLE')))
		         	return getenv('CDN_URL') . $src;
		         else
		         	return getenv('app.baseURL') . $src;
		    }
	}

if ( ! function_exists("blogUrl")) 
  {
     function blogUrl()
		    {
		         	return getenv('app.baseURL') . 'blog';
		    }
	}


if ( ! function_exists("loadImage")) 
  {
     function loadImage($image = null)
		    {
		         	return getenv('app.baseURL') . 'images/' . $image;
		    }
	}


if ( ! function_exists("getDbObject")) 
  {
     function getDbObject()
		    {
		          $db = \Config\Database::connect();
		          return $db;
		    }
	}


if ( ! function_exists("getNavLanguages")) 
  {
     function getNavLanguages()
		    {
		         $db       = getDbObject();
		         $builder  = $db->table('subject');
						 return $builder->select(['name', 'slug'])->where('show_nav', 1)->limit(10)->get();
		    }
	}

if ( ! function_exists("get_section_topics")) 
  {
     function get_section_topics($section_id = '')
		    {
		         $db       = getDbObject();
		         $builder  = $db->table('topics');
						 return $builder->select(['topic', 'slug'])->where('section_id', $section_id)->orderBy('sort', 'ASC')->get()->getResult();
		    }
	}


if ( ! function_exists("route")) 
  {
     function route($slug = '')
		    {
						 return getenv('app.baseURL') . $slug;
		    }
	}

if ( ! function_exists("topic_route")) 
  {
     function topic_route($subject_slug = '', $topic_slug)
		    {
						 return getenv('app.baseURL') . $subject_slug . '/' . $topic_slug;
		    }
	}



/* api */


if ( ! function_exists("google_trends_api")) 
   {
     function google_trends_api($code = "")
		    {		

					$db       		   	      = getDbObject();
					$countries              = $db->table('countries');

					$trends                 = new TrendModel();
					$trend_related_builder  = new TrendRelatedModel();

					 /* delete old records */
			    	$current_time 				  = time();
			    	$remain_time            = $current_time -  86400;
			   	  $trends->query("DELETE FROM `trends` WHERE `create_time` <= $remain_time");
			   	  $trend_related_builder->query("DELETE FROM `trends_related` WHERE `create_time` <= $remain_time");
			    /* close */


					if(empty($code)):
					 $code        		    = getenv('GOOGLE_DEFAULT_TRENDS');
					 $title                 = "India";
					else:
					 $country_obj 			  = $countries->select(['code', 'title'])->where('code', $code)->get()->getRow();
					 if(isset($country_obj->code))
					 	 {
					 	 	  $code           = $country_obj->code;
							  $title          = $country_obj->title;
					 	 }
					   else
					     {
					     	return [];
					     }
					endif;

				  $data['name']       = ucwords($title);

	    		$google_default_sec = getenv('GOOGLE_DEFAULT_TIME_SEC');
	    		$now                = time();
        		$cal_time           = $now - $google_default_sec;
        		//$trends_res_qry     = $trends->select(['id', 'title', 'image', 'news_url', 'source', 'formattedTraffic'])->where('create_time >=', $cal_time)->where('code', $code)->get();

        		$trends_res_qry     = $trends->query("SELECT `id`, `title`, `image`, `news_url`, `source`, `formattedTraffic` FROM `trends` WHERE `create_time` = (SELECT `create_time` FROM `trends` WHERE (`code` = '".$code."' AND `create_time` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");

        		$resp  = [];
        		$data['results']   = [];
        		if($trends_res_qry->getNumRows()):

        			foreach ($trends_res_qry->getResult('array') as $res)
            	$resp[] = ['id' => (int) $res['id'], 'title' => (string) $res['title'], 'image' => (string) $res['image'], 'news_url' => (string) $res['news_url'], 'source' => (string) $res['source'], 'formattedTraffic' => (string) $res['formattedTraffic']];

      			 $data['results']  = $resp;
      			 return $data;
      			endif;

	        	$options = [
				                'hl'  => 'en-GB',
				                'tz'  => -1200, # last hour
				                'geo' => $code,
	            		   ];

		        $time = time();

		        try
		         {
		         	$gt   = new GTrends($options);
		        	$get_daily_search_trends = $gt->getDailySearchTrends();
		         }

		        catch(Exception $e)
		         {
		         	  $countries->where(['code' => $code])->set('google_status', 0)->update();
            		$link =  route_to('google_trends');
            		header("Location:" . $link);
            		exit;
		         }
	          	
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
		                    $formattedTraffic = $trending_search_data['formattedTraffic'] ?? '';
		                    $image      = $trending_search_data['image']['imageUrl'] ?? '';
		                    $news_url   = $trending_search_data['image']['newsUrl'] ?? '';
		                    $source     = $trending_search_data['image']['source'] ?? '';
		                    $parent_data = [
		                                        'code' => $code,
		                                        'formattedTraffic' => $formattedTraffic,
		                                        'date_format' => $date_format ?? NULL,
		                                        'title' => $main_title,
		                                        'image'    => $image,
		                                        'news_url' => $news_url,
		                                        'source' => $source,
		                                        'create_time' => $time
		                                    ];

		                    $trends->insert($parent_data);

		                    $trend_id = $trends->insertID();

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
		                                                'create_time' => $time
		                                             ];
		                                $trend_related_builder->insert($child_data);

		                            endforeach;
		                        endif;
		                    endif;
		                endforeach;
		                endforeach;
		             endif;
		    		}

		        $resp = [];
		        $trends_res_qry  = $trends->select(['id', 'title', 'image', 'news_url', 'source', 'formattedTraffic'])->where('create_time', $time)->where('code', $code)->get();
            if($trends_res_qry->getNumRows())
            	 {
            	 	 foreach ($trends_res_qry->getResult('array') as $res)
            	 	 $resp[] = ['id' => (int) $res['id'], 'title' => (string) $res['title'], 'image' => (string) $res['image'], 'news_url' => (string) $res['news_url'], 'source' => (string) $res['source'], 'formattedTraffic' => (string) $res['formattedTraffic']];
            	 }
            $data['results'] = $resp;

            return $data;
		 } 
	}




if ( ! function_exists("youtube_trends_api")) 
  {
     function youtube_trends_api($code = "")
		  {
	        $db       		   	  = getDbObject();
          $countries            = $db->table('countries');
          $ytobj             	  = new YoutubeModel();

    	    if(empty($code)):
    			 $code        			  = getenv('GOOGLE_DEFAULT_TRENDS');
    			 $title                   = "India";
    	    else:
    			 $country_obj 			  = $countries->select(['code', 'title'])->where('code', $code)->get()->getRow();
    			 if(isset($country_obj->code)) {
	               $code                  = $country_obj->code;
	               $title                 = $country_obj->title;
	             }
	             else
	               	 {
	               	 	return [];
	               	 }
		    	endif;

			    $data_res['name']   = ucwords($title);

	    		$google_default_sec = getenv('GOOGLE_DEFAULT_TIME_SEC');
	    		$now                = time();
	        $cal_time           = $now - $google_default_sec;
	        	
	        	//$trends_res_qry     = $ytobj->select(['id', 'yt_id', 'title', 'description', 'thumbnails', 'channel_title', 'category_id', 'stats', 'published_at'])->where('created_at >=', $cal_time)->where('code', $code)->get();

	        	$trends_res_qry     = $ytobj->query("SELECT `id`, `yt_id`, `title`, `description`, `thumbnails`, `channel_title`, `category_id`, `stats`, `published_at` FROM `youtube_trends` WHERE `created_at` = (SELECT `created_at` FROM `youtube_trends` WHERE (`code` = '".$code."' AND `created_at` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");


	        	/* delete old records */
			    	 $current_time 				  = time();
			    	 $remain_time            = $current_time -  86400;
			   	   $ytobj->query("DELETE FROM `youtube_trends` WHERE `created_at` <= $remain_time");
			      /*  close */


	        	$data_res['results'] = [];

        		$resp = [];
            if($trends_res_qry->getNumRows()):

            	foreach ($trends_res_qry->getResult('array') as $res):
            		if(! empty($res['title'])):
            		  $stats_data = json_decode($res['stats'], true);
            		  $thumbnails = json_decode($res['thumbnails'], true);
            	 	  $resp[] = ['id' => (int) $res['id'], 'title' => (string) $res['title'], 'yt_id' => (string) $res['yt_id'], 'image' => (string) $thumbnails['high']['url'], 'channel_title' => (string) $res['channel_title'], 'category_id' => (string) $res['category_id'], 'like' => (int) $stats_data['likeCount'], 'view' => (int) $stats_data['viewCount'], 'comment' => (int) $stats_data['commentCount'], 'dislike' => (int) $stats_data['dislikeCount'], 'favorite' => (int) $stats_data['favoriteCount'], 'published_at' => (string) $res['published_at']];
            	 	endif;
            	endforeach;

          		$data_res['results'] = $resp;
          		return $data_res;
          	endif;

            $time 					   =  time();

            $youtube_trend_url         =  getenv('YOUTUBE_TREND_URL');
            $youtube_trend_url_search  =  ['PART', 'CODE', 'MAX_RESULTS', 'KEY'];
            $youtube_trend_url_replace =  ['snippet', $code, getenv('MAX_RESULTS'), getenv('GOOGLE_API_KEY')];

            $youtube_trend_url         =   str_replace($youtube_trend_url_search, $youtube_trend_url_replace, $youtube_trend_url);

            $flag = 0;
            try
             {
             	$get_file_contents  	   =  file_get_contents($youtube_trend_url);
             }

            catch(Exception $e)
             {
             	$flag = 1;
             }

            if($flag):
            	$countries->where(['code' => $code])->set('youtube_status', 0)->update();
            	$link =  route_to('youtube_trends');
            	header("Location:" . $link);
            	exit;
        	endif;

		    	$get_file_contents  	   =  file_get_contents($youtube_trend_url);
          $file_contents      	   =  json_decode($get_file_contents);  

            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $data['yt_id']         = $content->id;
                        $data['code']          = $code;
                        $data['title']         = $content->snippet->title;
                        $data['description']   = $content->snippet->description;
                        $data['thumbnails']    = json_encode($content->snippet->thumbnails);
                        $data['channel_title'] = $content->snippet->channelTitle;
                        $data['category_id']   = $content->snippet->categoryId  ;
                        $data['published_at']  = $content->snippet->publishedAt;
                        $data['stats']         = json_encode([]);//$content['stats'];
                        $data['created_at']    = $time;
                        $ytobj->insert($data);
                    endforeach;
                endif;
            endif;

            $youtube_trend_url         =  getenv('YOUTUBE_TREND_URL');
            $youtube_trend_url_search  =  ['PART', 'CODE', 'MAX_RESULTS', 'KEY'];
            $youtube_trend_url_replace =  ['statistics', $code, getenv('MAX_RESULTS'), getenv('GOOGLE_API_KEY')];

            $youtube_trend_url         =  str_replace($youtube_trend_url_search, $youtube_trend_url_replace, $youtube_trend_url);

            $get_file_contents 		   =  file_get_contents($youtube_trend_url);
            $file_contents      	   =  json_decode($get_file_contents);  
            if(isset($file_contents->items)):
                if(count($file_contents->items)):
                    foreach($file_contents->items as $content):
                        $yt_id                 = $content->id;
                        $stats                 = json_encode($content->statistics);
                        $ytobj->where(['yt_id' => $yt_id])->set('stats', $stats)->update();
                    endforeach;
                endif;
            endif;

		    $trends_res_qry     = $ytobj->select(['id', 'yt_id', 'title', 'description', 'thumbnails', 'channel_title', 'category_id', 'stats', 'published_at'])->where('created_at', $time)->where('code', $code)->get();

		    	  $resp = [];
            if($trends_res_qry->getNumRows())
            	 {
            	 	 foreach ($trends_res_qry->getResult('array') as $res):
            	 	 	if(! empty($res['title'])):
            	 	 	$stats_data = json_decode($res['stats'], true);
            	 	 	$thumbnails = json_decode($res['thumbnails'], true);
            	 	  $resp[] = ['id' => (int) $res['id'], 'title' => (string) $res['title'], 'yt_id' => (string) $res['yt_id'], 'image' => (string) $thumbnails['high']['url'], 'channel_title' => (string) $res['channel_title'], 'category_id' => (string) $res['category_id'], 'like' => (int) $stats_data['likeCount'], 'view' => (int) $stats_data['viewCount'], 'comment' => (int) $stats_data['commentCount'], 'dislike' => (int) $stats_data['dislikeCount'], 'favorite' => (int) $stats_data['favoriteCount'], 'published_at' => (string) $res['published_at']];
            	 	  endif;
            	 	endforeach;
            	 }
            $data_res['results'] = $trends_res_qry->getResult();

        	return $data_res;
		}
 }


if ( ! function_exists("twitter_trends_api")) 
  {
     function twitter_trends_api($country = "", $place = "")
      {
      	    $twittertrends  =  new TrendLocationModel();
      	    $twitter_trends =  new TwitterTrendsModel();

      	    /* delete old records */
		    	   $current_time 				  = time();
		    	   $remain_time           = $current_time -  86400;
		   	     $twitter_trends->query("DELETE FROM `twitter_trends` WHERE `create_time` <= $remain_time");
		       /*  close */


      	    if(! empty($country) OR ! empty($place)) 
      	      {
      	      	if( ! empty($place)):
		      	    	 $loc_qry  = $twittertrends->select(['name', 'parent_id', 'woeid'])->limit(1)->where(['alias' => $place])->get();
		      	    else:
		      	    	 $loc_qry  = $twittertrends->select(['name', 'parent_id', 'woeid'])->limit(1)->where(['country_code' => $country])->get();
		      	    endif;

		      	    if($loc_qry->getNumRows()):
		      	    	$loc_obj     =  $loc_qry->getRow();
		      	    	$woeid       =  $loc_obj->woeid;
		      	    	$name        =  $loc_obj->name;
		      	    	$parent_id   =  $loc_obj->parent_id;

		      	    	$sub_loc_name = '';
		      	    	if($parent_id != 1):
		      	    	 $sub_loc_qry = $twittertrends->select(['name'])->limit(1)->where(['woeid' => $parent_id, 'parent_id' => 1])->get();
		      	    	 if($sub_loc_qry->getNumRows())
		      	    	 $name        =  $name . ', ' . $sub_loc_qry->getRow()->name;
		      	     	endif;

		      	    else:
		      	    	$woeid    	  =   getenv('TWITTER_DEFAULT_WOEID');
		      	    	$name         =   "Worldwide";
		      	    endif;

		      	 }
		      	else
		      		 {
		      		 		$woeid    	  =   getenv('TWITTER_DEFAULT_WOEID');
		      	    	$name         =   "Worldwide";
		      		 }

      	    $arr['name']          =  $name;

      	    $twitter_default_sec  =  getenv('TWITTER_DEFAULT_TIME_SEC');
      	    $now                  =  time();
        		$cal_time             =  $now - $twitter_default_sec;

      	    //$trends_res_qry       =  $twitter_trends->select(['id', 'name', 'url', 'tweet_volume'])->where('create_time >=', $cal_time)->where('woeid', $woeid)->get();

      	    $trends_res_qry       =  $twitter_trends->query("SELECT `id`, `name`, `url`, `tweet_volume` FROM `twitter_trends` WHERE `create_time` = (SELECT `create_time` FROM `twitter_trends` WHERE (`woeid` = '".$woeid."' AND `create_time` >= $cal_time) ORDER BY `id` DESC LIMIT 1)");

      	  $arr = [];
        	if($trends_res_qry->getNumRows()):
        		 foreach($trends_res_qry->getResult('array') as $res)
        	   $arr[]      =  ['name' => (string) $res['name'], 'url' => (string) $res['url'], 'tweet_volume' => (int) $res['tweet_volume']];
      			return $arr;
      	  endif;

      		$settings  =       array(
			                            'oauth_access_token' => getenv('TWITTER_OAUTH_ACCESS_TOKEN'),
			                            'oauth_access_token_secret' => getenv('TWITTER_OAUTH_ACCESS_TOKEN_SECRET'),
			                            'consumer_key' => getenv('TWITTER_CONSUMER_KEY'),
			                            'consumer_secret' => getenv('TWITTER_CONSUMER_SECRET')
                         			);

	        $url            =  getenv('TWITTER_TREND_URL');
	        $requestMethod  = "GET";
	        $getfield       = "?id=" . $woeid;
	        $twitter        = new TwitterAPIExchange($settings);

	        $is_error_occured = false;
	        try
	         {
	         	$json_response    = $twitter->setGetfield($getfield)->buildOauth($url, $requestMethod)->performRequest();
	         }
	        catch(Exception $e)
	         {
	         	$is_error_occured = true;
	         }
	        
	       	$time      		  =  time();
	       	$result         =  array();

	        if( ! $is_error_occured):

		        $resp    = @json_decode($json_response);

		        if(count($resp)):
		        	foreach($resp[0]->trends as $content):
                        $data 						 = [];
                        $data['woeid']               = $woeid;
                        $data['name']                = $content->name;
                        $data['url']                 = $content->url;
                        $data['promoted_content']    = $content->promoted_content;
                        $data['query']               = $content->query;
                        $data['tweet_volume']        = $content->tweet_volume;
                        $data['create_time']         = $time;
                        $result[] 					 				 = ['name' => (string) $content->name, 'url' => (string) $content->url, 'tweet_volume' => $content->tweet_volume];
                        $twitter_trends->insert($data);
		       		endforeach;
		       	endif;

		    endif;

		    return $result;
      }
  }





