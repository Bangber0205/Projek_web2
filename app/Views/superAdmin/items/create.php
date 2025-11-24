<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-8">
    <h1 class="text-3xl font-extrabold text-gray-900">Tambah Barang</h1>
    <nav class="text-sm text-gray-600 mt-3" aria-label="Breadcrumb">
        <ol class="list-reset flex space-x-2">
            <li><a href="#" class="">Dashboard</a></li>
            <li>></li>
            <li class="text-gray-500">Tambah Barang</li>
        </ol>
    </nav>
</div>

<!-- Section Header: Informasi Barang -->

<!-- Display Validation Errors -->
<?php if(session()->has('errors')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4" role="alert">
        <ul class="list-disc list-inside">
            <?php foreach(session('errors') as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<!-- Form Input Field -->
<form action="<?= base_url('superadmin/items/store') ?>" method="post" class="space-y-8 max-w-full sm:max-w-full bg-white p-8 rounded-lg border border-gray-200 shadow-md">
    <?= csrf_field() ?>
    <div class="">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Informasi Barang</h2>
        <p class="text-sm text-gray-500 leading-relaxed">Masukkan detail informasi barang baru dengan lengkap dan tepat.</p>
    </div>

    <!-- Nama Barang -->
    <div class="flex flex-col">
        <label for="nama_barang" class="mb-2 font-semibold text-gray-900">
            Nama Barang <span class="text-red-600">*</span>
        </label>
        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" required
            value="<?= old('nama_barang') ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">Contoh: Pasta gigi, Sikat gigi, Mie instan</p>
    </div>

    <!-- Kode Barang -->
    <div class="flex flex-col">
        <label for="kode_barang" class="mb-2 font-semibold text-gray-900">
            Kode Barang <span class="text-red-600">*</span>
        </label>
        <input type="text" id="kode_barang" name="kode_barang" placeholder="Masukkan kode barang" required
            value="<?= old('kode_barang') ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">(Terdiri dari 2-3 huruf dan diakhiri dengan angka, contoh : SBK-1)</p>
    </div>

    <!-- Kategori -->
    <div class="flex flex-col">
        <label for="kategori" class="mb-2 font-semibold text-gray-900">
            Kategori <span class="text-red-600">*</span>
        </label>
        <input type="text" id="kategori" name="kategori" placeholder="Masukkan nama kategori" required
            value="<?= old('kategori') ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
    </div>

    <!-- Harga per item -->
    <div class="flex flex-col">
        <label for="harga" class="mb-2 font-semibold text-gray-900">
            Harga per item <span class="text-red-600">*</span>
        </label>
        <input type="number" id="harga" name="harga" placeholder="Masukkan harga per item (Rp.)" required min="0"
            value="<?= old('harga') ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
    </div>

    <!-- Jumlah Barang -->
    <div class="flex flex-col">
        <label for="jumlah" class="mb-2 font-semibold text-gray-900">
            Jumlah Barang <span class="text-red-600">*</span>
        </label>
        <input type="number" id="jumlah" name="jumlah" placeholder="Masukkan jumlah barang" required min="0"
            value="<?= old('jumlah') ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">Jumlah dari stock barang</p>
    </div>

    <!-- Tombol Aksi -->
    <div>
        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center px-6 py-3 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-400 transition">
            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Barang
        </button>
    </div>
</form>

<?= $this->endSection() ?>
