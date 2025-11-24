<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Daftar User</h1>
    <nav class="text-sm text-gray-400 mt-1 border-b border-gray-300 pb-3">
        <span>Dashboard</span> > <span>Daftar User</span>
    </nav>
</div>

<!-- Bar Aksi & Pencarian -->
<div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
    <!-- Tombol Tambah User -->
    <a href="<?= base_url('superadmin/users/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg flex items-center">
        <span class="mr-2">+</span> Tambah User
    </a>

    <!-- Input Pencarian + Tombol Cari -->
    <div class="flex items-center gap-2">
        <form action="<?= base_url('superadmin/users') ?>" method="GET" class="flex items-center gap-2">
            <input type="text" name="search" value="<?= esc($search ?? '') ?>" placeholder="Masukkan Kata Kunci ..." class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                <span class="mr-2">🔍</span> Cari
            </button>
        </form>
    </div>
</div>

<!-- Tabel Data User -->
<div class="bg-white shadow">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kontak</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal Dibuat</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <?php foreach ($users as $i => $user): ?>
            <tr class="<?= $i % 2 == 1 ? 'bg-gray-50' : 'bg-white' ?>">
                <td class="px-6 py-4 text-sm text-gray-900">UR<?= str_pad($user->id, 3, '0', STR_PAD_LEFT) ?></td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= esc($user->username) ?></td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= esc($user->email) ?></td>
                <td class="px-6 py-4 text-sm text-gray-900">-</td>
                <td class="px-6 py-4 text-sm">
                    <?php
                    $role = $user->group_name ?? 'User';
                    $roleClass = '';
                    if ($role === 'Owner') {
                        $roleClass = 'text-green-500';
                    } elseif ($role === 'Super Admin') {
                        $roleClass = 'text-red-500';
                    }
                    ?>
                    <span class="<?= $roleClass ?>"><?= esc($role) ?></span>
                </td>
                <td class="px-6 py-4 text-sm text-gray-900"><?= date('d-m-Y', strtotime($user->created_at)) ?></td>
                <td class="px-6 py-4 text-sm text-gray-900 relative">
                    <div class="dropdown">
                        <button class="text-gray-500 hover:text-gray-700 focus:outline-none" onclick="toggleDropdown(<?= $user->id ?>)">
                            •••
                        </button>
                        <div id="dropdown-<?= $user->id ?>" class="dropdown-menu hidden absolute right-0 mt-2 w-32 bg-white border border-gray-200 rounded-md shadow-lg z-10">
                            <a href="<?= base_url('superadmin/users/edit/' . $user->id) ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Edit</a>
                            <form action="<?= base_url('superadmin/users/delete/' . $user->id) ?>" method="post" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                <?= csrf_field() ?>
                                <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100">Hapus</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
function toggleDropdown(userId) {
    const dropdown = document.getElementById('dropdown-' + userId);
    dropdown.classList.toggle('hidden');
}

// Close dropdown when clicking outside
document.addEventListener('click', function(event) {
    if (!event.target.closest('.dropdown')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.add('hidden');
        });
    }
});
</script>

<?= $this->endSection() ?>
