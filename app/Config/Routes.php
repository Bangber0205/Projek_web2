<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->group('superadmin', function($routes) {
    $routes->get('dashboard', 'SuperAdmin\Dashboard::index');
});
