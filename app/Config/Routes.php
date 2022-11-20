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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->post('/auth', 'Home::auth');
$routes->get('/logout', 'Home::logout');
$routes->get('dashboard', 'Auth::index', ['filter' => 'auth']);

$routes->get('kriteria', 'Kriteria::kriteria', ['filter' => 'auth']);
$routes->get('add_kriteria', 'Kriteria::add', ['filter' => 'auth']);
$routes->add('create_kriteria', 'Kriteria::create', ['filter' => 'auth']);
$routes->get('detil_kriteria/(:any)', 'Kriteria::detil_kriteria/$1', ['filter' => 'auth']);
$routes->add('update_kriteria/(:any)', 'Kriteria::update/$1', ['filter' => 'auth']);
$routes->add('destroy_kriteria/(:any)', 'Kriteria::destroy/$1', ['filter' => 'auth']);
$routes->get('sub_kri/(:any)', 'Kriteria::subkriteria/$1', ['filter' => 'auth']);

$routes->get('sub_kriteria', 'Subkriteria::index', ['filter' => 'auth']);
$routes->get('add_sub_kriteria', 'Subkriteria::add', ['filter' => 'auth']);
$routes->add('create_sub_kriteria', 'Subkriteria::create', ['filter' => 'auth']);
$routes->get('detil_sub_kriteria/(:any)', 'Subkriteria::edit/$1', ['filter' => 'auth']);
$routes->add('update_sub_kriteria/(:any)', 'Subkriteria::update/$1', ['filter' => 'auth']);
$routes->add('destroy_sub_kriteria/(:any)', 'Subkriteria::destroy/$1', ['filter' => 'auth']);


$routes->get('karyawan', 'Karyawan::index', ['filter' => 'auth']);
$routes->get('add_karyawan', 'Karyawan::add', ['filter' => 'auth']);
$routes->add('create_karyawan', 'Karyawan::create', ['filter' => 'auth']);
$routes->get('detil_karyawan/(:any)', 'Karyawan::detil_karyawan/$1', ['filter' => 'auth']);
$routes->add('update_karyawan/(:any)', 'Karyawan::update/$1', ['filter' => 'auth']);
$routes->add('destroy_karayawan/(:any)', 'Karyawan::destroy/$1', ['filter' => 'auth']);

//users
$routes->get('dashboard/users', 'Auth::users', ['filter' => 'auth']);

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
