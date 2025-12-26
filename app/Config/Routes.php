<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Feedbacks::index');
$routes->post('/', 'Feedbacks::index');
$routes->post('/Feedbacks/save', 'Feedbacks::save');

$routes->get('login', 'AuthController::login');
$routes->post('login', 'AuthController::attemptLogin');
$routes->get('register', 'AuthController::register');
$routes->post('register', 'AuthController::attemptRegister');
$routes->get('logout', 'AuthController::logout');

$routes->group('superadmin', function($routes) {
    $routes->get('dashboard', 'SuperAdmin\Dashboard::index');
    $routes->get('users', 'SuperAdmin\UserController::index');
    $routes->get('users/create', 'SuperAdmin\UserController::create');
    $routes->post('users/store', 'SuperAdmin\UserController::store');
    $routes->get('users/edit/(:num)', 'SuperAdmin\UserController::edit/$1');
    $routes->post('users/update/(:num)', 'SuperAdmin\UserController::update/$1');
    $routes->post('users/delete/(:num)', 'SuperAdmin\UserController::delete/$1');
    $routes->get('branches', 'SuperAdmin\BranchController::index');
    $routes->get('branches/create', 'SuperAdmin\BranchController::create');
    $routes->post('branches/store', 'SuperAdmin\BranchController::store');
    $routes->get('branches/edit/(:num)', 'SuperAdmin\BranchController::edit/$1');
    $routes->post('branches/update/(:num)', 'SuperAdmin\BranchController::update/$1');
    $routes->post('branches/delete/(:num)', 'SuperAdmin\BranchController::delete/$1');
    $routes->get('categories', 'SuperAdmin\CategoryController::index');
    $routes->get('categories/create', 'SuperAdmin\CategoryController::create');
    $routes->post('categories/store', 'SuperAdmin\CategoryController::store');
    $routes->get('categories/edit/(:num)', 'SuperAdmin\CategoryController::edit/$1');
    $routes->post('categories/update/(:num)', 'SuperAdmin\CategoryController::update/$1');
    $routes->post('categories/delete/(:num)', 'SuperAdmin\CategoryController::delete/$1');
    $routes->get('categories/detail/(:num)', 'SuperAdmin\CategoryController::detail/$1');
    $routes->get('items', 'SuperAdmin\ItemController::index');
    $routes->get('items/create', 'SuperAdmin\ItemController::create');
    $routes->post('items/store', 'SuperAdmin\ItemController::store');
    $routes->get('items/edit/(:num)', 'SuperAdmin\ItemController::edit/$1');
    $routes->post('items/update/(:num)', 'SuperAdmin\ItemController::update/$1');
    $routes->post('items/delete/(:num)', 'SuperAdmin\ItemController::delete/$1');
    $routes->get('penjualan/laporan', 'SuperAdmin\SalesReportController::index');
    $routes->get('stok/laporan', 'SuperAdmin\StockReportController::index');
    $routes->get('keuangan/cabang', 'SuperAdmin\KeuanganCabangController::index');
});

// Owner
$routes->group('owner', function($routes){
    $routes->get('dashboard', 'Owner\Dashboard::index');
    $routes->get('riwayat-transaksi', 'Owner\RiwayatTransaksi::index');
    $routes->get('stok-barang', 'Owner\StokBarangController::index');
    $routes->get('stok-barang/create', 'Owner\StokBarangController::create');
    $routes->post('stok-barang/store', 'Owner\StokBarangController::store');
    $routes->get('stok-barang/edit/(:num)', 'Owner\StokBarangController::edit/$1');
    $routes->post('stok-barang/update/(:num)', 'Owner\StokBarangController::update/$1');
    $routes->get('stok-barang/delete/(:num)', 'Owner\StokBarangController::delete/$1');
    $routes->get('input-penjualan', 'Owner\InputPenjualanController::index');
});
