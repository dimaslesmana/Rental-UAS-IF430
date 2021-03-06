<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->group('auth', function ($routes) {
	$routes->post('login', 'Auth::doLogin');
	$routes->post('register', 'Auth::newUser');
	$routes->get('login', 'Auth::login');
	$routes->get('register', 'Auth::register');
});

$routes->group('dashboard', ['filter' => 'admin_auth'], function ($routes) {
	$routes->get('products', 'Dashboard::productList');
	$routes->get('orders', 'Dashboard::orderList');
	$routes->get('products/add', 'Dashboard::addProduct');
	$routes->get('products/edit', 'Dashboard::editProductGet');
	$routes->post('products/edit', 'Dashboard::editProductPost');
	$routes->post('products/add/save', 'Dashboard::newProduct');
	$routes->post('products/edit/save', 'Dashboard::updateProduct');
	$routes->delete('products/delete/(:num)', 'Dashboard::deleteProduct/$1');
	$routes->addRedirect('orders(:any)', 'dashboard/orders');
	$routes->addRedirect('products/add(:any)', 'dashboard/products/add');
	$routes->addRedirect('products(:any)', 'dashboard/products');
});

$routes->group('order', ['filter' => 'authed_auth'], function ($routes) {
	$routes->get('rents', 'Order::orderList', ['filter' => 'user_auth']);
	$routes->post('changestatus', 'Order::changeRentStatus', ['filter' => 'authed_auth']);
	$routes->addRedirect('rents(:any)', 'order/rents');
});

$routes->group('rents', function ($routes) {
	$routes->post('addCart', 'Product::addToCart', ['filter' => 'user_auth']);
	$routes->delete('cart/delete/(:num)', 'Product::deleteCart/$1', ['filter' => 'user_auth']);
	$routes->post('checkout', 'Product::checkout', ['filter' => 'user_auth']);
	$routes->get('cart', 'Product::cart', ['filter' => 'user_auth']);
	$routes->get('detail/(:num)', 'Product::detail/$1');
	$routes->get('/', 'Product::index');
	$routes->addRedirect('cart(:any)', 'rents/cart');
	$routes->addRedirect('(:any)', 'rents');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
