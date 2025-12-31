<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Display Success Message -->
<?php if(session()->has('success')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
        <?= session('success') ?>
    </div>
<?php endif; ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Daftar Barang</h1>
    <nav class="text-sm text-gray-400 mt-1 border-b border-gray-300 pb-3 breadcrumb-border ">
        <span>Dashboard</span> > <span>Barang</span>
    </nav>
</div>

<!-- Bar Aksi -->
<div class="flex flex-col md:flex-row justify-end items-center mb-6 gap-4">
    <div class="flex space-x-2">        
        <!-- Tambah Barang Button -->
        <a href="<?= base_url('superadmin/items/create') ?>" class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"></path>
            </svg>
            Tambah Barang
        </a>

        <!-- Pilih Kategori Dropdown -->
        <div class="relative inline-block text-left">
            <button type="button" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500" id="filterCategoryBtn" aria-haspopup="true" aria-expanded="true">
                Semua Kategori
                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <!-- Dropdown menu, show/hide with JavaScript -->
            <div id="filterCategoryMenu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" role="menu" aria-orientation="vertical" aria-labelledby="filterCategoryBtn" tabindex="-1">
                <div class="py-1" role="none">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" data-category="all">Semua Kategori</a>
                    <?php if (!empty($categories) && is_array($categories)): ?>
                        <?php foreach ($categories as $category): ?>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" data-category="<?= esc($category['code']) ?>"><?= esc($category['name']) ?></a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Data Barang -->
<div class="bg-white shadow-sm rounded-lg overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 table-auto">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kode Barang</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Barang</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Harga Jual</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Jumlah Stok</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
                <?php if (!empty($items) && is_array($items)): ?>
                    <?php foreach ($items as $item): ?>
                        <tr class="bg-white hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium"><?= esc($item['kode_barang']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['nama_barang']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['kategori']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp <?= number_format($item['harga'], 0, ',', '.') ?>/item</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['jumlah']) ?> Barang</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex space-x-2 items-center">
                                    <a href="<?= base_url('superadmin/items/edit/' . $item['id']) ?>" class="bg-blue-500 text-white px-3 py-1 rounded-md text-xs hover:bg-blue-600">Edit</a>
                                    <form class="inline-flex" action="<?= base_url('superadmin/items/delete/' . $item['id']) ?>" method="POST" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md text-xs hover:bg-red-600">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-center" colspan="6">Belum ada data barang.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
document.getElementById('filterCategoryBtn').addEventListener('click', function() {
    const menu = document.getElementById('filterCategoryMenu');
    menu.classList.toggle('hidden');
});

// Handle category selection
document.querySelectorAll('#filterCategoryMenu a').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        const selectedCategory = this.getAttribute('data-category');
        const buttonText = this.textContent;
        document.getElementById('filterCategoryBtn').innerHTML = buttonText + ' <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>';
        document.getElementById('filterCategoryMenu').classList.add('hidden');

        // Filter table rows
        const rows = document.querySelectorAll('tbody tr');
        rows.forEach(function(row) {
            const categoryCell = row.querySelector('td:nth-child(3)');
            if (categoryCell) {
                const category = categoryCell.textContent.trim();
                if (selectedCategory === 'all' || category === selectedCategory) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
});
</script>

<?= $this->endSection() ?>
