<?php

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





