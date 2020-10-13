<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'Pages::index');

//pages 
// $routes->get('/pages', 'pages::index');
$routes->get('/about', 'Pages::about');

$routes->get('/contact', 'Pages::contact');

$routes->group('poliklinik', ['filter' => 'auth'], function ($routes) {
	//  polikliknik
	$routes->get('/poliklinik', 'Poliklinik\Home::index');
	//CRUD PASIEN
	$routes->add('pasien', 'Poliklinik\Pasien::index');
	$routes->add('pasien/create', 'Poliklinik\Pasien::create');
	$routes->get('pasien/update/(:segment)', 'Poliklinik\Pasien::update/$1');
	$routes->get('pasien/detail/(:segment)', 'Poliklinik\Pasien::detail/$1');

	//CRUD SPESIALIS
	$routes->add('spesialis', 'Poliklinik\Spesialis::index');
	$routes->get('spesialis/detail/(:segment)', 'Poliklinik\Spesialis::detail/$1');
	$routes->get('spesialis/update/(:segment)', 'Poliklinik\Spesialis::update/$1');

	//CRUD DOKTER
	$routes->add('dokter', 'Poliklinik\Dokter::index');
	$routes->add('dokter/create', 'Poliklinik\Dokter::create');
	$routes->get('dokter/detail/(:segment)', 'Poliklinik\Dokter::detail/$1');
	$routes->get('dokter/update/(:segment)', 'Poliklinik\Dokter::update/$1');
});

//CRUD DOKTER
//Authentication Login & Register
$routes->get('/login', 'Pages::login');
$routes->get('/registrasi', 'Pages::register');


/**
 * (:any) digunakan untuk menangkap seluruh jenis inputan
 * (:segment) digunakan untuk menangkap seluruh jenis inputan kecuali forward slash (/)
 * (:num) digunakan untuk menangkap angka
 * (:alpha) digunakan untuk menangkap data berupa huruf
 * (:alphanum) digunakan untuk menangkap data berupa huruf dan angka
 * (:hash) memiliki konsep yang sama dengna segment hanya saja.. ini lebih mudah digunakan jika ketika id pada routing menggunakan hash
 */

/**
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
