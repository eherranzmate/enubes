<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/perfil', 'Perfil::index');
$routes->get('login', 'AuthController::login');
$routes->post('/loginAuth', 'AuthController::loginAuth');
$routes->get('/logout', 'AuthController::logout');
$routes->get('/dashboard', 'DashboardController::index');

