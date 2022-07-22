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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('dashboard', 'Home::index');
$routes->get('dashboard/(:any)/(:any)', 'Home::index/$1/$2');

$routes->get('listpasien', 'ListPasien::index');

$routes->get('pasient-today', 'ListPasienToday::index');
$routes->post('pasient-today/update', 'ListPasienToday::ubah');

$routes->get('hasil', 'hasil::index');
$routes->post('hasil', 'hasil::index');

$routes->get('hasil/(:any)', 'hasil::cek_laporan/$1');

$routes->get('daftar', 'Daftar::index');
$routes->add('getdata', 'Daftar::getdata');
$routes->add('savedata', 'Daftar::saveData');

$routes->get('login', 'Login::index');
$routes->post('login/cekUser', 'Login::cekUser');
$routes->get('logout', 'Login::logout');

$routes->delete('hapus/(:any)', 'ListPasienToday::delete/$1');
$routes->get('laporan', 'Laporan::index');
$routes->get('laporan/print_laporan_tanggal', 'Laporan::print_laporan_tanggal');
$routes->post('laporan/print_laporan_tanggal', 'Laporan::print_laporan_tanggal');
$routes->get('laporan/print_laporan_bulan', 'Laporan::print_laporan_bulan');
$routes->post('laporan/print_laporan_bulan', 'Laporan::print_laporan_bulan');
$routes->get('laporan/print_laporan_tahun', 'Laporan::print_laporan_tahun');
$routes->post('laporan/print_laporan_tahun', 'Laporan::print_laporan_tahun');

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
