<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<!-- Title -->
<h1 class="text-3xl font-bold mt-3 mb-4 text-[#1F2937] font-inter">Tambah Kategori Barang</h1>

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
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Tambah Kategori</span>
            </div>
        </li>
    </ol>
</nav>

<!-- Form Card -->
<div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
    <!-- Section Header -->
    <div class="mb-6">
        <h2 class="text-lg font-bold text-gray-900 mb-2">Informasi Kategori Barang</h2>
        <p class="text-sm text-gray-600">Masukkan detail informasi kategori baru</p>
    </div>

    <!-- Separator -->
    <hr class="mb-6 border-gray-200">

    <!-- Form -->
    <form action="<?= base_url('superadmin/categories/store') ?>" method="POST" class="space-y-6">
        <?= csrf_field() ?>

        <!-- Nama Kategori -->
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                Nama Kategori <span class="text-red-500">*</span>
            </label>
            <input type="text" id="name" name="name" value="<?= old('name') ?>"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                   placeholder="Masukkan nama kategori" required>
            <p class="mt-1 text-xs text-gray-500">Contoh: Pasta, Makanan Siap Saji</p>
            <?php if (isset($errors['name'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= $errors['name'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Kode Kategori -->
        <div>
            <label for="code" class="block text-sm font-medium text-gray-700 mb-2">
                Kode Kategori <span class="text-red-500">*</span>
            </label>
            <input type="text" id="code" name="code" value="<?= old('code') ?>"
                   class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm uppercase"
                   placeholder="Masukkan kode kategori" required>
            <p class="mt-1 text-xs text-gray-500">(Terdiri dari 2-3 huruf, contoh: SBK, PR)</p>
            <?php if (isset($errors['code'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= $errors['code'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Deskripsi Kategori -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                Deskripsi Kategori
            </label>
            <textarea id="description" name="description" rows="4"
                      class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm resize-none"
                      placeholder="Masukkan deskripsi kategori (opsional)"><?= old('description') ?></textarea>
            <?php if (isset($errors['description'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= $errors['description'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Status Kategori -->
        <div>
            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                Status Kategori <span class="text-red-500">*</span>
            </label>
            <select id="status" name="status"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm appearance-none bg-white">
                <option value="aktif" <?= old('status') === 'aktif' || !old('status') ? 'selected' : '' ?>>Aktif</option>
                <option value="nonaktif" <?= old('status') === 'nonaktif' ? 'selected' : '' ?>>Nonaktif</option>
            </select>
            <p class="mt-1 text-xs text-gray-500">Status dari kategori barang</p>
            <?php if (isset($errors['status'])): ?>
                <p class="mt-1 text-sm text-red-600"><?= $errors['status'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="inline-flex items-center px-6 py-3 text-sm font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Tambah Kategori
            </button>
        </div>
    </form>
</div>

<!-- Success/Error Messages -->
<?php if (session()->has('message')): ?>
    <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<script>
// Auto-uppercase for code field
document.getElementById('code').addEventListener('input', function(e) {
    this.value = this.value.toUpperCase();
});
</script>

<?= $this->endSection() ?>
