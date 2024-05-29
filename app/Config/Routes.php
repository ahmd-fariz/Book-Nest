<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'UserController::index');
$routes->get('/insert', 'InputController::index');

//Auth
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');

$routes->get('/register', 'AuthController::register');
$routes->post('/register', 'AuthController::register');

$route['default_controller'] = 'form';
$route['form/submit'] = 'form/submit';
$route['form/success'] = 'form/success';

$routes->get('/inputcontroller/create', 'InputController::create');
$routes->post('/inputcontroller/store', 'InputController::store');

$routes->get('/inputcontroller/CreateKategori', 'InputController::CreateKategori');
$routes->post('/inputcontroller/storekategori', 'InputController::storekategori');

$routes->get('/peminjaman/create', 'PeminjamanController::create');
$routes->post('/peminjaman/store', 'PeminjamanController::store');
$routes->get('/peminjaman/return', 'PeminjamanController::createReturn');
$routes->post('/peminjaman/return', 'PeminjamanController::return');
$routes->get('/peminjaman/update-status', 'PeminjamanController::updateStatus');

$routes->get('/cron/update-status', 'Cron::updateStatus');
$routes->get('/bukus', 'BukuController::index');
$routes->get('/peminjamans', 'PeminjamanController::index');    

$routes->get('/library', 'UserController::library');

$routes->get('/peminjaman/edit/(:num)', 'PeminjamanController::edit/$1');
$routes->delete('/peminjaman/delete/(:num)', 'PeminjamanController::delete/$1');




