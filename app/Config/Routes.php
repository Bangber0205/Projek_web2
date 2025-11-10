<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');

$routes->group('superadmin', ['filter' => 'login'], function($routes) {
    $routes->get('dashboard', 'SuperAdmin\Dashboard::index');   
});
