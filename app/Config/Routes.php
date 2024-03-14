<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'UserController::index');
$routes->get('/login', 'AuthController::create');
<<<<<<< HEAD
$routes->post('/login', 'AuthController::save');
=======
$routes->post('/login/save', 'AuthController::save');
$routes->get('/loginin', 'CobaController::ho');
>>>>>>> 186806921be1336eec9de9b48b38b41de2de4135
