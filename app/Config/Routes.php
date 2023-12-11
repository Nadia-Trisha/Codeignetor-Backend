<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AdminHome::index',['filter' => 'authGurd']);
// $routes->get('/about', 'about::index');
// $routes->get('/contact', 'contact::index');
// $routes->get('/services', 'services::index');
$routes->get('/', 'ProductController::index',['filter' => 'authGurd']);
$routes->get('products', 'ProductController::index',['filter' => 'authGurd']);
$routes->get('create', 'ProductController::create',['filter' => 'authGurd']);
$routes->post('store', 'ProductController::store',['filter' => 'authGurd']);
$routes->get('products/delete/(:num)', 'ProductController::delete/$1',['filter' => 'authGurd']);
$routes->get('products/edit/(:num)', 'ProductController::edit/$1',['filter' => 'authGurd']);
$routes->put('products/update/(:num)', 'ProductController::update/$1',['filter' => 'authGurd']);

//signup
$routes->get('signup', 'SignupController::index');
$routes->match(['get','post'],'signup/store','SignupController::store');

//login
$routes->get('login','LoginController::index');
$routes->post('login','LoginController::login');

//logout
$routes->get('/signout','LoginController::logout');

//catagory
$routes->get('category','CategoryController::index',['filter' => 'authGurd']); //category list
$routes->get('category/create','CategoryController::create',['filter' => 'authGurd']); //category entry form
$routes->post('category/store','CategoryController::store',['filter' => 'authGurd']); //category store/save
$routes->get('category/edit/(:num)','CategoryController::edit/$1',['filter' => 'authGurd']); //category edit form
$routes->post('category/update/(:num)','CategoryController::update/$1',['filter' => 'authGurd']); //category update
$routes->get('category/delete/(:num)','CategoryController::delete/$1',['filter' => 'authGurd']); //category delete

//Frontend
$routes->get('productsall', 'FrontendProductController::index');
$routes->post('product/(:num)', 'FrontendProductController::show/$1');



