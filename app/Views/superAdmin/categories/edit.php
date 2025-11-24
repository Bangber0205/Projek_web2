<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Edit Kategori Barang</h1>
    <nav class="text-sm text-gray-500 mt-2">
        <span>Dashboard</span> > <span>Edit Kategori Barang</span>
    </nav>
</div>

<!-- Section Header: Informasi Kategori -->
<div class="bg-white shadow-sm rounded-lg p-6 mb-6">
    <h2 class="text-lg font-bold text-gray-900 mb-2">Informasi Kategori</h2>
    <p class="text-sm text-gray-600 mb-4">Perbarui detail informasi kategori</p>

    <!-- Flash Messages -->
    <?php if (session()->has('errors')): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul>
                <?php foreach (session('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (session()->has('message')): ?>
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            <?= session('message') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('superadmin/categories/update/' . $category['id']) ?>" method="POST">
        <?= csrf_field() ?>

        <!-- Nama Kategori -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Nama Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="<?= old('name', $category['name']) ?>" placeholder="Masukkan nama kategori" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Kode Kategori -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Kode Kategori <span class="text-red-500">*</span></label>
            <input type="text" name="code" value="<?= old('code', $category['code']) ?>" placeholder="Masukkan kode kategori" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <p class="text-xs text-gray-500 mt-1">Kode unik kategori, huruf besar (contoh: ELEC, FASH)</p>
        </div>

        <!-- Status Kategori -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Status <span class="text-red-500">*</span></label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Status</option>
                <option value="aktif" <?= (old('status', $category['status']) == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                <option value="nonaktif" <?= (old('status', $category['status']) == 'nonaktif') ? 'selected' : '' ?>>Nonaktif</option>
            </select>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center justify-center">
                <span class="mr-2">💾</span> Simpan Perubahan
            </button>
            <button type="button" onclick="document.querySelector('form').reset()" class="bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded-lg flex items-center justify-center hover:bg-gray-50">
                <span class="mr-2">🔄</span> Reset Form
            </button>
            <a href="<?= base_url('superadmin/categories') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg flex items-center justify-center">
                <span class="mr-2">⬅️</span> Kembali
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
