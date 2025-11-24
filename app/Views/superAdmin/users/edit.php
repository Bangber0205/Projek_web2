<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="flex items-center justify-between mb-6">
    <h1 class="text-3xl font-bold text-[#1F2937] font-inter">Edit User</h1>
    <a href="<?= base_url('superadmin/users') ?>" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg">Kembali</a>
</div>
<div class="border-t-2 border-black/40 my-6"></div>

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

<div class="bg-white shadow p-6">
    <form action="<?= base_url('superadmin/users/update/' . $user->id) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-4">
            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
            <input type="text" name="username" id="username" value="<?= old('username', esc($user->username)) ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" id="email" value="<?= old('email', esc($user->email)) ?>" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700">Password (Kosongkan jika tidak ingin mengubah)</label>
            <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label for="group_id" class="block text-sm font-medium text-gray-700">Role</label>
            <select name="group_id" id="group_id" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Pilih Role</option>
                <?php foreach ($groups as $group): ?>
                    <option value="<?= $group->id ?>" <?= ($groupId == $group->id) ? 'selected' : '' ?>>
                        <?= esc($group->name) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Update User</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>
