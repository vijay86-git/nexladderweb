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

$routes->get('/google-trends', 'Trends::google', ['as' => 'google_trends']);
$routes->get('/google-trends/(:any)', 'Trends::google/$1', ['as' => 'google_trends_country']);


$routes->get('/youtube-trends', 'Trends::youtube', ['as' => 'youtube_trends']);
$routes->get('/youtube-trends/(:any)', 'Trends::youtube/$1', ['as' => 'youtube_trends_country']);

$routes->get('/twitter-trends', 'Trends::twitter', ['as' => 'twitter_trends']);
$routes->get('/twitter-trends/(:any)', 'Trends::twitter/$1', ['as' => 'twitter_trends_country']);
$routes->get('/twitter-trends/(:any)/(:any)', 'Trends::twitter/$1/$2', ['as' => 'twitter_trends_country_place']);

$routes->get('/users.json', 'Api::usersJson', ['as' => 'users.json']);


$routes->get('/converter', 'Converter::converter/$1', ['as' => 'convertor']);
$routes->get('/converter/(:any)', 'Converter::unit/$1', ['as' => 'unit.convertor']);


$routes->group('panel', ['namespace' => 'App\Controllers\Admin'], function ($routes) {

    $routes->get('/', 'Auth::index', ['as' => 'admin.get.login']);

    $routes->post('login', 'Auth::login', ['as' => 'admin.post.login']);

    $routes->get('dashboard', 'Dashboard::index', ['as' => 'admin.dashboard.index']);

    $routes->get('forgot-password', 'Auth::forgot', ['as' => 'admin.forgot.index']);

    $routes->post('forgot', 'Auth::forgotPassword', ['as' => 'admin.post.forgot']);

    $routes->get('logout', 'Dashboard::logout', ['as' => 'admin.dashboard.logout']);


    $routes->get('subjects/new', 'Subjects::new', ['as' => 'admin.subject.new']);
    $routes->post('subjects', 'Subjects::create', ['as' => 'admin.subject.create']);
    $routes->get('subjects', 'Subjects::index', ['as' => 'admin.subjects.index']);
    $routes->get('subjects/(:segment)/edit', 'Subjects::edit/$1', ['as' => 'admin.subject.edit']);
    $routes->post('subjects/(:segment)', 'Subjects::update/$1', ['as' => 'admin.subject.update']);


    $routes->get('sections/new', 'Sections::new', ['as' => 'admin.section.new']);
    $routes->post('sections', 'Sections::create', ['as' => 'admin.section.create']);
    $routes->get('sections', 'Sections::index', ['as' => 'admin.sections.index']);
    $routes->get('sections/(:segment)/edit', 'Sections::edit/$1', ['as' => 'admin.section.edit']);
    $routes->post('sections/(:segment)', 'Sections::update/$1', ['as' => 'admin.section.update']);


    $routes->get('topics/new', 'Topics::new', ['as' => 'admin.topic.new']);
    $routes->post('topics', 'Topics::create', ['as' => 'admin.topic.create']);
    $routes->get('topics', 'Topics::index', ['as' => 'admin.topics.index']);
    $routes->get('topics/(:segment)/edit', 'Topics::edit/$1', ['as' => 'admin.topic.edit']);
    $routes->post('topics/(:segment)', 'Topics::update/$1', ['as' => 'admin.topic.update']);



    $routes->get('images', 'Images::index', ['as' => 'admin.images.index']);
    $routes->post('images', 'Images::create', ['as' => 'admin.images.create']);


});

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
