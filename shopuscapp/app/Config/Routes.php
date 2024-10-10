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
