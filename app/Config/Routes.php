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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
// $routes->get('/', 'Dashboard::index');
// $routes->get('/siswa', 'Siswa::index');
// $routes->get('/siswa/tambah', 'Siswa::tambah');
// $routes->get('/siswa/edit', 'Siswa::edit');

$routes->group('', function ($routes) {
    $routes->get('/dashboard', 'Dashboard::index');
    // auth 
    $routes->get('/register', 'Register::index');
    $routes->post('/register/process', 'Register::process');
    $routes->get('/', 'Login::index');
    $routes->get('/login', 'Login::index');
    $routes->post('/login/process', 'Login::process');
    $routes->get('/logout', 'Login::logout');
    // auth 
    // user 
    $routes->get('/user', 'UserController::index');
    $routes->add('/user', 'UserController::create');
    $routes->add('user/(:segment)/edit', 'UserController::edit/$1');
    $routes->get('user/(:segment)/delete', 'UserController::delete/$1');
    // user 
    // siswa 
    $routes->get('/siswa', 'SiswaController::index');
    $routes->add('/siswa', 'SiswaController::create');
    $routes->add('/siswa/edit/(:segment)', 'SiswaController::editSiswa/$1');
    $routes->add('siswa/(:segment)/edit', 'SiswaController::edit/$1');
    $routes->get('siswa/(:segment)/delete', 'SiswaController::delete/$1');
    // siswa 
    // guru
    $routes->get('/guru', 'GuruController::index');
    $routes->add('/guru', 'GuruController::create');
    $routes->add('/guru/edit/(:segment)', 'GuruController::editGuru/$1');
    $routes->add('guru/(:segment)/edit', 'GuruController::edit/$1');
    $routes->get('guru/(:segment)/delete', 'GuruController::delete/$1');
    // guru 
    // profile 
    $routes->get('/profile', 'ProfileController::index');
    $routes->add('/profile', 'ProfileController::create');
    $routes->add('/profile/edit/(:segment)', 'ProfileController::editProfile/$1');
    $routes->add('profile/(:segment)/edit', 'ProfileController::edit/$1');
    $routes->get('profile/(:segment)/delete', 'ProfileController::delete/$1');
    // profile 
    // kegiatan 
    $routes->get('/kegiatan', 'KegiatanController::index');
    $routes->add('/kegiatan', 'KegiatanController::create');
    $routes->add('/kegiatan/edit/(:segment)', 'KegiatanController::editKegiatan/$1');
    $routes->add('kegiatan/(:segment)/edit', 'KegiatanController::edit/$1');
    $routes->get('kegiatan/(:segment)/delete', 'KegiatanController::delete/$1');
    // kegiatan 
    // arsip 
    $routes->get('/arsip', 'ArsipController::index');
    $routes->add('/arsip', 'ArsipController::create');
    $routes->add('/arsip/edit/(:segment)', 'ArsipController::editArsip/$1');
    $routes->add('/arsip/editFile/(:segment)', 'ArsipController::editArsipFile/$1');
    $routes->add('arsip/(:segment)/edit', 'ArsipController::edit/$1');
    $routes->add('arsip/(:segment)/editFile', 'ArsipController::editFile/$1');
    $routes->get('arsip/(:segment)/delete', 'ArsipController::delete/$1');
    // arsip 
    // kontak 
    $routes->get('/kontak', 'KontakController::index');
    $routes->add('/kontak', 'KontakController::create');
    $routes->add('/kontak/edit/(:segment)', 'KontakController::editKontak/$1');
    $routes->add('kontak/(:segment)/edit', 'KontakController::edit/$1');
    $routes->get('kontak/(:segment)/delete', 'KontakController::delete/$1');
    // kontak 
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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
