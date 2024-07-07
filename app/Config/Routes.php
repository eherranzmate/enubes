<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'AuthController::login');
$routes->post('/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/landing', 'AuthController::landing');
$routes->get('/dashboard', 'DashboardController::index');
$routes->post('/dashboard/editProfile', 'DashboardController::editProfile');
$routes->post('/dashboard/editUser/(:num)', 'DashboardController::editUser/$1');
$routes->post('/dashboard/editLandingPage', 'AuthController::editLandingPage');


