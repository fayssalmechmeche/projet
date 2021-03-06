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
$routes->get('/', 'Home::index');
$routes->get('/connexion', 'Connexion::index', ['as' => 'connexion']);
$routes->get('inscription/', 'Inscription::index', ['as' => 'inscription']);
$routes->get('/inscription/save', 'Inscription::save', ['as' => 'save']);
$routes->get('/dashboard', 'DashboardUser::index', ['as' => 'dashboard']);
$routes->get('dashboardAdmin/', 'DashboardAdmin::index', ['as' => 'dashboardAdmin']);
$routes->get('dashboardAdmin/delete', 'DashboardAdmin::delete', ['as' => 'delete']);
$routes->get('dashboardAdmin/update', 'DashboardAdmin::update', ['as' => 'update']);
$routes->get('dashboardAdmin/deleteHeber', 'DashboardAdmin::deleteHeber', ['as' => 'deleteHeber']);

$routes->get('dashboardAdmin/users', 'DashboardAdmin::users', ['as' => 'users']);
$routes->get('dashboard/reservation', 'DashboardUser::reservation', ['as' => 'reservation']);
$routes->get('home', 'Home::index', ['as' => 'home']);
$routes->get('dashboardAdmin/reservation', 'DashboardAdmin::AfficherReservation', ['as' => 'reservations']);

$routes->get('dashboardUser/update', 'DashboardUser::update', ['as' => 'userUpdate']);




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
