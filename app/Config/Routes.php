<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index',['filter' => 'authGurd']);
// $routes->get('/about', 'about::index');
// $routes->get('/contact', 'contact::index');
// $routes->get('/services', 'services::index');
$routes->get('/', 'ProductController::index');
$routes->get('products', 'ProductController::index');
$routes->get('create', 'ProductController::create');
$routes->post('store', 'ProductController::store');
$routes->get('products/delete/(:num)', 'ProductController::delete/$1');
$routes->get('products/edit/(:num)', 'ProductController::edit/$1');
$routes->put('products/update/(:num)', 'ProductController::update/$1');

//signup
$routes->get('signup', 'SignupController::index');
$routes->match(['get','post'],'signup/store','SignupController::store');

//login
$routes->get('login','LoginController::index');
$routes->post('login','LoginController::login');

//logout
$routes->get('/signout','LoginController::logout');


