<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Title & Breadcrumb -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900">Keuangan Cabang</h1>
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

    <!-- Statistic cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <!-- Total Penjualan -->
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Penjualan</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['total_penjualan']) ?></p>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg ml-auto">
                <span class="text-2xl"></span>
            </div>
        </div>
        <!-- Total Keuntungan (Bersih) -->
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Keuntungan (Bersih)</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['total_keuntungan']) ?></p>
            </div>
            <div class="bg-green-100 p-3 rounded-lg ml-auto">
                <span class="text-2xl"></span>
            </div>
        </div>
        <!-- Rata-rata Penjualan -->
        <div class="bg-white border border-gray-200 p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Rata-rata Penjualan</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['rata_rata_penjualan']) ?></p>
            </div>
            <div class="bg-pink-100 p-3 rounded-lg ml-auto">
                <span class="text-2xl"></span>
            </div>
        </div>
    </div>

    <!-- Filter Form -->
    <section class="bg-white rounded-lg shadow p-6 mb-8">
        <form action="" method="GET" class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-6">
            <div class="flex-1">
                <label for="cabangs" class="block text-gray-700 mb-1 font-semibold">Cabang</label>
                <div class="relative">
                    <select id="cabangs" name="cabang" class="w-full border border-gray-300 rounded-md p-2.5 appearance-none text-gray-500 placeholder-gray-300">
                        <option value="" disabled selected>Pilih Cabang</option>
                        <?php foreach ($branch_options as $option): ?>
                            <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="pointer-events-none absolute top-3 right-3 text-gray-400 select-none">▼</div>
                </div>
            </div>
            <div class="flex-1">
                <label for="dari_tanggal" class="block text-gray-700 mb-1 font-semibold">Dari Tanggal</label>
                <div class="relative">
                    <input type="date" id="dari_tanggal" name="dari_tanggal" class="w-full border border-gray-300 rounded-md p-2.5 placeholder-gray-400" placeholder="YYYY-MM-DD" />
                    <div class="pointer-events-none absolute top-3 right-3 text-gray-400 select-none">📅</div>
                </div>
            </div>
            <div class="flex-1">
                <label for="sampai_tanggal" class="block text-gray-700 mb-1 font-semibold">Sampai Tanggal</label>
                <div class="relative">
                    <input type="date" id="sampai_tanggal" name="sampai_tanggal" class="w-full border border-gray-300 rounded-md p-2.5 placeholder-gray-400" placeholder="YYYY-MM-DD" />
                    <div class="pointer-events-none absolute top-3 right-3 text-gray-400 select-none">📅</div>
                </div>
            </div>
            <div class="flex-1">
                <label for="jenis_laporan" class="block text-gray-700 mb-1 font-semibold">Jenis Laporan</label>
                <div class="relative">
                    <select id="jenis_laporan" name="jenis_laporan" class="w-full border border-gray-300 rounded-md p-2.5 appearance-none text-gray-500 placeholder-gray-300">
                        <option value="" disabled selected>Pilih Laporan</option>
                        <?php foreach ($jenis_laporan_options as $option): ?>
                            <option value="<?= esc($option) ?>"><?= esc($option) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="pointer-events-none absolute top-3 right-3 text-gray-400 select-none">▼</div>
                </div>
            </div>
        </form>
    </section>

    <!-- Table Section -->
    <section class="bg-white rounded-lg shadow overflow-x-auto overflow-y-auto">
                <table aria-label="Laporan Keuangan Cabang" class="min-w-full table-auto divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Cabang</th>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Tanggal</th>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Total Penjualan</th>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Total Modal</th>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Total Keuntungan</th>
                            <th class="px-6 py-4 text-left font-semibold uppercase text-gray-600 whitespace-nowrap truncate">Jumlah Transaksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php foreach ($reports as $idx => $report): ?>
                        <tr class="">
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['cabang']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['tanggal']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['total_penjualan']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['total_modal']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['total_keuntungan']) ?></td>
                            <td class="px-6 py-4 whitespace-nowrap truncate"><?= esc($report['jumlah_transaksi']) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
    </section>

</div>

<?= $this->endSection() ?>
