<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/home', 'RegisterController::index');
$routes->get('/home/register', 'RegisterController::register');
$routes->post('/signup', 'RegisterController::signup');
$routes->get('/home/login', 'RegisterController::login');
$routes->post('/signin', 'RegisterController::signin');
$routes->post('/logout', 'RegisterController::logout');