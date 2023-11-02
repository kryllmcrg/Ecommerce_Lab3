<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/login', 'AdminController::login'); 
$routes->get('/register', 'AdminController::register'); 
$routes->post('/authreg', 'AdminController::authreg'); 
$routes->post('/authlog', 'AdminController::authlogin');
$routes->get('home', 'UserController::home');
$routes->get('products/(:num)', 'ProductController::view/$1');

