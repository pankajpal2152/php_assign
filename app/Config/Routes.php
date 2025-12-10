<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Auth::login');
$routes->get('/login', 'Auth::login');
$routes->post('/login', 'Auth::doLogin');
$routes->get('/logout', 'Auth::logout');


$routes->get('/employees', 'Employees::index');
$routes->get('/employees/create', 'Employees::create');
$routes->post('/employees/store', 'Employees::store');
$routes->get('/employees/edit/(:num)', 'Employees::edit/$1');
$routes->post('/employees/update/(:num)', 'Employees::update/$1');
$routes->get('/employees/delete/(:num)', 'Employees::delete/$1');
