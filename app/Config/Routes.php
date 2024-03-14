<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'UserController::index');
$routes->get('/login', 'AuthController::create');
<<<<<<< HEAD
$routes->post('/login', 'AuthController::login');
=======

$routes->post('/login', 'AuthController::save');

$routes->post('/login/save', 'AuthController::save');
>>>>>>> 8982fb9055335e05cfbb43c04400d1e6021b3d87
