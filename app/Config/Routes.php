<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AppController::home');
$routes->get('home', 'AppController::home');
$routes->get("profil","AppController::profil");
$routes->get("upload","AppController::upload");

$routes->get("foto/(:num)/preview","AppController::preview/$1");
$routes->get("foto/(:num)/delete","AppController::delete/$1");
$routes->get("/(:num)","AppController::template2/$1");

$routes->post("edit_foto","AppController::edit_foto");

$routes->get("register","RegistController::register");
$routes->post("proses_register","RegistController::proses_register");

$routes->get("login","LoginController::login");
$routes->post("proses_login","LoginController::proses_login");

$routes->get("logout","AppController::logout");

$routes->post("upload_foto","AppController::upload_foto");
$routes->get("search","AppController::search");

$routes->post("komen","AppController::komen");
    
$routes->post("like/(:num)","AppController::like/$1");

$routes->post("add_album","AppController::add_album");
    

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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
