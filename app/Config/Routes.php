<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/index', 'UserController::index');
$routes->get('/login', 'AuthController::create');

$routes->post('/login', 'AuthController::save');

$routes->post('/login/save', 'AuthController::save');
