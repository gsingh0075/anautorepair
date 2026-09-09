<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('about-us', 'Home::aboutUs');
$routes->get('services', 'Home::services');
$routes->get('services/(:segment)', 'Home::service/$1');
$routes->get('contact-us', 'Home::contactUs');
$routes->post('submit-inquiry', 'Home::submitInquiry');
$routes->get('sitemap.xml', 'Home::sitemap');

$routes->match(['get', 'post'], 'admin/login', 'Admin::login');
$routes->get('admin/logout', 'Admin::logout');
$routes->group('admin', ['filter' => 'adminAuth'], static function ($routes) {
    $routes->get('/', 'Admin::index');
    $routes->get('inquiries/(:num)', 'Admin::show/$1');
});
