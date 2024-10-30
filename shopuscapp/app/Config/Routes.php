<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->setDefaultController('Home');

$routes->get('homepage', 'Home::index');
$routes->get('login_signup_main', 'Authentication::index');
$routes->get('buyer_login', 'Authentication::buyer_login');
$routes->get('seller_login', 'Authentication::seller_login');
$routes->get('buyer_signup', 'Authentication::buyer_signup');
$routes->get('seller_signup', 'Authentication::seller_signup');

//routes to register + login a buyer based on controller
$routes->post('auth/registerBuyer', 'Authentication::registerBuyer');
$routes->post('auth/loginBuyer', 'Authentication::loginBuyer');

//routes to register + login a seller based on controller
$routes->post('auth/registerSeller', 'Authentication::registerSeller');
$routes->post('auth/loginSeller', 'Authentication::loginSeller');

//routes to return views after login
$routes->get('seller_dashboard', 'SellerController::index');
$routes->get('business_listing', 'BuyerController::index');

//posts ad to businessad table
$routes->post('post_ad', 'SellerController::postAd');


//gets business details from seller + businessad tables
$routes->get('buyer/viewBusinessDetails/(:num)', 'BuyerController::viewBusinessDetails/$1');

//posts order to transactions table
$routes->post('buyer/postTransaction/(:num)', 'BuyerController::postTransaction/$1');
