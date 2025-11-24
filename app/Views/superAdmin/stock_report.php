<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto p-0">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900"><?= esc($title) ?></h1>
        <nav class="text-sm text-gray-400 mt-1" aria-label="Breadcrumb">
            <?php foreach ($breadcrumb as $label => $link) : 
                if ($link): ?>
                    <a href="<?= esc($link) ?>" class="hover:underline"><?= esc($label) ?></a>
                    <span class="mx-2">></span>
                <?php else: ?>
                    <span><?= esc($label) ?></span>
                <?php endif; 
            endforeach; ?>
        </nav>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Produk</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['total_produk']) ?></p>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M21 16.5V7.5a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 7.5v9a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4a2 2 0 001-1.73zM12 3.4l7 4V17l-7 4-7-4v-9l7-4z" />
                    <path d="M12 12l-4-2.29v4.58L12 17l4-2.29v-4.58L12 12z"/>
                </svg>
            </div>
        </div>
        <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Stok Menipis</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['stok_menipis']) ?></p>
            </div>
            <div class="bg-yellow-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                </svg>
            </div>
        </div>
        <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Stok Habis</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['stok_habis']) ?></p>
            </div>
            <div class="bg-red-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </div>
        </div>
    </div>

    <section class="bg-white rounded-lg shadow p-6 mb-8">
        <form action="" method="GET" class="flex flex-col sm:flex-row sm:items-end sm:space-x-6 space-y-4 sm:space-y-0">
            <div class="flex-1">
                <label for="cabang" class="block text-gray-700 mb-1 font-semibold">Cabang</label>
                <div class="relative">
                    <select id="cabang" name="cabang" class="w-full border border-gray-300 rounded-md p-2.5 appearance-none text-gray-500 placeholder-gray-300">
                        <option value="" disabled selected>Pilih Cabang</option>
                        <?php foreach ($branch_options as $branch): ?>
                            <option value="<?= esc($branch) ?>" <?= $selectedBranch === $branch ? 'selected' : '' ?>><?= esc($branch) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="pointer-events-none absolute top-3 right-3 text-gray-400 select-none">▼</div>
                </div>
            </div>
            <div>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Filter</button>
            </div>
        </form>
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Detail Stok Produk</h2>
        <div class="overflow-x-auto">
            <table aria-label="Detail Stok Produk" role="table" class="min-w-full divide-y divide-gray-200 table-auto">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kode Produk</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Stok</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Cabang</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($items as $item): ?>
                    <tr class="bg-white hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900"><?= esc($item['product_name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['product_code']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['category_name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['jumlah']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><?= esc($item['branch_name'] ?? '') ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php if(empty($items)): ?>
                    <tr>
                        <td colspan="5" class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-500">Tidak ada data stok produk.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?= $this->endSection() ?>
