<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Edit Cabang</h1>
    <nav class="text-sm text-gray-500 mt-2">
        <span>Dashboard</span> > <span>Edit Cabang</span>
    </nav>
</div>

<!-- Section Header: Informasi Cabang -->
<div class="bg-white shadow-sm rounded-lg p-6 border mb-6">
    <h2 class="text-lg font-bold text-gray-900 mb-2">Informasi Cabang</h2>
    <p class="text-sm text-gray-600 mb-4">Perbarui detail informasi cabang</p>

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

    <form action="<?= base_url('superadmin/branches/update/' . $branch['id']) ?>" method="POST">
        <?= csrf_field() ?>

        <!-- Nama Cabang -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Nama Cabang <span class="text-red-500">*</span></label>
            <input type="text" name="name" value="<?= old('name', $branch['name']) ?>" placeholder="Masukkan nama cabang" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <p class="text-xs text-gray-500 mt-1">Contoh: Cabang Jakarta Pusat, Cabang Surabaya</p>
        </div>

        <!-- Alamat Cabang -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Alamat Cabang <span class="text-red-500">*</span></label>
            <input type="text" name="location" value="<?= old('location', $branch['location']) ?>" placeholder="Masukkan alamat cabang" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <p class="text-xs text-gray-500 mt-1">Sertakan jalan, nomor, dan kota cabang</p>
        </div>

        <!-- Kontak Cabang -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Kontak Cabang <span class="text-red-500">*</span></label>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nomor Telepon -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">📞</span>
<input type="text" name="contact" value="<?= old('contact', $branch['contact'] ?? '') ?>" placeholder="Nomor telepon cabang" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Email -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">✉️</span>
                    <input type="email" name="email" value="<?= old('email', $branch['email'] ?? '') ?>" placeholder="Email cabang" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>
        </div>

        <!-- Tanggal Peresmian -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Tanggal Peresmian <span class="text-red-500">*</span></label>
            <div class="relative">
<input type="date" name="opening_date" value="<?= old('opening_date', isset($branch['opening_date']) ? date('Y-m-d', strtotime($branch['opening_date'])) : '') ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">📅</span>
            </div>
            <p class="text-xs text-gray-500 mt-1">Tanggal resmi pembukaan cabang</p>
        </div>

        <!-- Status -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Status</label>
            <select name="status" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Status</option>
                <option value="aktif" <?= (old('status', $branch['status']) == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                <option value="non-aktif" <?= (old('status', $branch['status']) == 'non-aktif') ? 'selected' : '' ?>>Non-Aktif</option>
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
            <a href="<?= base_url('superadmin/branches') ?>" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-lg flex items-center justify-center">
                <span class="mr-2">⬅️</span> Kembali
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
