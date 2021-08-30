<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
    require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->get('/about', 'Page::about', ['as' => 'about']);
$routes->get('/disclaimer', 'Page::disclaimer', ['as' => 'disclaimer']);
$routes->get('/contact-us', 'Page::contact_us', ['as' => 'contact.get']);
$routes->post('/contact-us', 'Page::contact_us', ['as' => 'contact.post']);
$routes->get('/sitemap', 'Page::sitemap', ['as' => 'sitemap']);

$routes->get('/codemirror/(:any)/(:any)', 'Page::codeMirror/$1/$2', ['as' => 'codemirror']);

$routes->get('/subjects.json', 'Api::subjects');
$routes->get('/subject-topics/(:any)', 'Api::subjectTopics/$1');

$routes->get('/topic-detail/(:any)', 'Api::topicDetail/$1', ['as' => 'topic-detail.json']);


$routes->get('/blog-categories.json', 'Api::blogCategories');
//$routes->get('/blogs.json', 'Page::getBlogs', ['as' => 'blogs.json']);
$routes->get('/category-blogs/(:any)', 'Api::categoryBlogs/$1', ['as' => 'category-blogs.json']);

$routes->get('/blog-detail/(:any)', 'Api::blogDetail/$1', ['as' => 'blog-detail.json']);

$routes->get('/trends.json', 'Api::trends', ['as' => 'trends.json']);
$routes->get('/related_trends/(:any)', 'Api::relatedTrends/$1', ['as' => 'related_trends.json']);

$routes->get('/youtube.json', 'Api::youtube', ['as' => 'youtube.json']);
$routes->get('/youtube_stats.json', 'Api::youtube_stats', ['as' => 'youtube_stats.json']);
$routes->get('/youtube_api', 'Api::youtube_api', ['as' => 'youtube_api.json']);


$routes->get('/twitter', 'Api::twitter', ['as' => 'twitter.json']);
$routes->get('/twitter_api', 'Api::twitter_api', ['as' => 'twitter_api.json']);



$routes->get('/(:any)/(:any)', 'Page::topics/$1/$2', ['as' => 'topic.detail']);
$routes->get('/(:any)', 'Page::subject/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
