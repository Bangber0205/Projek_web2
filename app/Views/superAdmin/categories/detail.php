<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Title -->
<h1 class="text-3xl font-bold mt-3 mb-4 text-[#1F2937] font-inter">Detail Kategori Barang</h1>

<!-- Breadcrumb -->
<nav class="flex mb-5" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
            <a href="<?= base_url('superadmin/dashboard') ?>" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                Dashboard
            </a>
        </li>
        <li>
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="<?= base_url('superadmin/categories') ?>" class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400 hover:text-blue-600">Daftar Kategori</a>
            </div>
        </li>
        <li aria-current="page">
            <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400"><?= esc($category['name']) ?></span>
            </div>
        </li>
    </ol>
</nav>

<!-- Content Card -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <h2 class="text-lg font-bold text-gray-900 mb-4">Informasi Detail</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h3 class="font-semibold text-gray-600">Nama Kategori</h3>
            <p class="text-gray-900"><?= esc($category['name']) ?></p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-600">Kode Kategori</h3>
            <p class="text-gray-900"><?= esc($category['code']) ?></p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-600">Deskripsi</h3>
            <p class="text-gray-900"><?= esc($category['description']) ?: '-' ?></p>
        </div>
        <div>
            <h3 class="font-semibold text-gray-600">Status</h3>
            <p class="text-gray-900"><?= ($category['status'] === 'aktif') ? 'Aktif' : 'Nonaktif' ?></p>
        </div>
    </div>
    <div class="mt-6">
        <a href="<?= base_url('superadmin/categories') ?>" class="inline-block px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Kembali ke Daftar Kategori</a>
    </div>
</div>

<?= $this->endSection() ?>
