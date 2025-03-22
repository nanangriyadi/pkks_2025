<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// admin portfolio
$routes->get('/admin_portfolio', 'Portfolio::index');
$routes->get('/admin_portfolio/edit/(:num)', 'Portfolio::edit/$1');
$routes->get('/portfolio/upload', 'Portfolio::upload');
$routes->post('/portfolio/save', 'Portfolio::save');
$routes->get('/portfolio/detail/(:num)', 'Portfolio::detail/$1');
$routes->get('/portfolio/edit/(:num)', 'Portfolio::edit/$1');
$routes->post('/portfolio/update/(:num)', 'Portfolio::update/$1');

// Add this route for GET method deletion (since your link is using GET)
$routes->get('/admin_portfolio/delete/(:num)', 'Portfolio::delete/$1');
// Keep the POST method route as well for form submissions
$routes->post('/admin_portfolio/delete/(:num)', 'Portfolio::delete/$1');

// admin about
$routes->get('/admin_about', 'About::index');
$routes->get('/admin_about/create', 'About::create');
$routes->post('/admin_about/save', 'About::save');
$routes->get('/about/edit/(:num)', 'About::edit/$1');
$routes->get('/admin_about/edit/(:num)', 'About::edit/$1');

// client
$routes->get('/', 'Home::index');
$routes->get('/about', 'Home::about');
$routes->get('/portfolio', 'Home::portfolio');
$routes->get('/team', 'Home::team');
$routes->get('/contact', 'Home::contact');

//  DELETE untuk penghapusan
$routes->post('/admin_about/delete/(:num)', 'About::delete/$1');

// admin
$routes->get('/admin', 'Admin::index');

// eror
$routes->get('/404', 'Home::error');