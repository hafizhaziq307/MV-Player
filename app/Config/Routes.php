<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
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
$routes->get('/', 'Page::home', ['as' => 'page_home']);

$routes->group('music', function ($routes) {
    $routes->get('', 'Music::index', ['as' => 'music_index']);
    $routes->get('create', 'Music::create', ['as' => 'music_create']);
    $routes->get('(:any)/(:any)/edit', 'Music::edit/$1/$2', ['as' => 'music_edit']);
    $routes->post('', 'Music::save', ['as' => 'music_save']);
    $routes->patch('(:any)/(:any)', 'Music::update/$1/$2', ['as' => 'music_update']);
    $routes->delete('(:any)/(:any)', 'Music::delete/$1/$2', ['as' => 'music_delete']);
});

$routes->group('singer', function ($routes) {
    $routes->get('', 'Singer::index', ['as' => 'singer_index']);
    $routes->get('create', 'Singer::create', ['as' => 'singer_create']);
    $routes->get('(:any)/edit', 'Singer::edit/$1', ['as' => 'singer_edit']);
    $routes->post('', 'Singer::save', ['as' => 'singer_save']);
    $routes->patch('(:any)', 'Singer::update/$1', ['as' => 'singer_update']);
    $routes->delete('(:any)', 'Singer::delete/$1', ['as' => 'singer_delete']);
});

$routes->group('thumbnail', function ($routes) {
    $routes->get('(:any)/(:any)/edit', 'Thumbnail::create/$1/$2', ['as' => 'thumbnail_create']);
    $routes->post('', 'Thumbnail::save', ['as' => 'thumbnail_save']);
});

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
