<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('RegistrationController');
$routes->setDefaultMethod('welcome');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.


//Expert routes
$routes->get('', 'RegistrationController::welcome',['filter'=>'AuthGuard']);
$routes->get('/experts/(:any)', 'ExpertController::view/$1',['filter'=>'AuthGuard']);
$routes->get('/experts/(:any)/(:any)', 'ExpertController::view/$1/$2',['filter'=>'AuthGuard']);
$routes->post('/experts/editStudent/(:num)', 'ExpertController::editStudent/$1',['filter'=>'AuthGuard']);
$routes->post('/experts/addStudent', 'ExpertController::addStudent',['filter'=>'AuthGuard']);
$routes->post('/experts/addExercise', 'ExpertController::addExercise',['filter'=>'AuthGuard']);
$routes->post('/experts/editExercise/(:num)', 'ExpertController::editExercise/$1',['filter'=>'AuthGuard']);
$routes->post('/experts/editProfile/(:num)', 'ExpertController::editProfile/$1',['filter'=>'AuthGuard']);


/// Kids Routes
$routes->match(['get', 'post'], 'kids/avatar/buy', 'KidsController::view/avatar',['filter'=>'AuthGuard']);
$routes->match(['get', 'post'], 'kids/feedback/(:any)', 'KidsController::view/feedback/$1',['filter'=>'AuthGuard']);
$routes->get('/kids/(:any)', 'KidsController::view/$1',['filter'=>'AuthGuard']);
$routes->get('/kids/(:any)/(:any)', 'KidsController::view/$1/$2',['filter'=>'AuthGuard']);
$routes->post('/kids/exercise/(:num)', 'KidsController::ex/$1',['filter'=>'AuthGuard']);
$routes->get('/kids/exercise/(:num)', 'KidsController::exercise/$1',['filter'=>'AuthGuard']);


/// LogIn
$routes->get('/registration/expertLogin', 'RegistrationController::expertLogin');
$routes->get('/registration/studentLogin', 'RegistrationController::studentLogin');
$routes->get('/registration/register', 'RegistrationController::register');
$routes->get('/registration/welcome', 'RegistrationController::welcome');

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
