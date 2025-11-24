<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Tambah User</h1>
    <nav class="text-sm text-gray-500 mt-2">
        <span>Dashboard</span> > <span>Tambah User</span>
    </nav>
</div>

<!-- Section Header: Informasi User -->
<div class="bg-white shadow-sm p-6 mb-6">
    <h2 class="text-lg font-bold text-gray-900 mb-2">Informasi User</h2>
    <p class="text-sm text-gray-600 mb-4">Masukkan detail informasi user baru</p>

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

    <form action="<?= base_url('superadmin/users/store') ?>" method="POST">
        <?= csrf_field() ?>

        <!-- ID User -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">ID User <span class="text-red-500">*</span></label>
            <input type="text" name="user_id" value="<?= old('user_id') ?>" placeholder="Masukkan id user" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <p class="text-xs text-gray-500 mt-1">Contoh: UR001</p>
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Username <span class="text-red-500">*</span></label>
            <input type="text" name="username" value="<?= old('username') ?>" placeholder="Masukkan nama user" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Role <span class="text-red-500">*</span></label>
            <select name="group_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Pilih Role</option>
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id ?>" <?= (old('group_id') == $group->id) ? 'selected' : '' ?>><?= esc($group->name) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Kontak User -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Kontak User <span class="text-red-500">*</span></label>
            <div class="space-y-3">
                <!-- Nomor Telepon -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">📞</span>
                    <input type="text" name="phone" value="<?= old('phone') ?>" placeholder="Nomor telepon user" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Email -->
                <div class="relative">
                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">✉️</span>
                    <input type="email" name="email" value="<?= old('email') ?>" placeholder="Email user" class="w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            </div>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block mb-2 font-medium text-gray-700">Password <span class="text-red-500">*</span></label>
            <input type="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>

        <!-- Tanggal Dibuat -->
        <div class="mb-6">
            <label class="block mb-2 font-medium text-gray-700">Tanggal Dibuat <span class="text-red-500">*</span></label>
            <div class="relative">
                <input type="date" name="created_date" value="<?= old('created_date', date('Y-m-d')) ?>" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">📅</span>
            </div>
            <p class="text-xs text-gray-500 mt-1">Tanggal pembuatan user</p>
        </div>

        <!-- Tombol Aksi -->
        <div class="flex flex-col sm:flex-row gap-4">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center justify-center">
                <span class="mr-2">+</span> Tambah User
            </button>
            <button type="button" onclick="document.querySelector('form').reset()" class="bg-white border border-gray-300 text-gray-700 px-6 py-2 rounded-lg flex items-center justify-center hover:bg-gray-50">
                <span class="mr-2">🔄</span> Reset Form
            </button>
        </div>
    </form>
</div>

<?= $this->endSection() ?>
