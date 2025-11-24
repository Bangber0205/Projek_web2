<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="max-w-7xl mx-auto p-0">

    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900"><?= esc($title) ?></h1>
        <nav class="breadcrumb-border text-sm text-gray-400 mt-1 border-b border-gray-300 pb-3" aria-label="Breadcrumb">
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
                <p class="text-sm font-medium text-gray-600">Total Penjualan</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['total_penjualan']) ?></p>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M7 2a1 1 0 00-1 1v2.382a1 1 0 01-.553.894l-3.553 2.11V15a1 1 0 001 1h12a1 1 0 001-1V8.386a1 1 0 00-.553-.894l-3.553-2.11A1 1 0 0113 5.382V3a1 1 0 00-1-1H7z" />
                </svg>
            </div>
        </div>
        <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Jumlah Transaksi</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['jumlah_transaksi']) ?></p>
            </div>
            <div class="bg-green-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v3a1 1 0 001 1h8a1 1 0 001-1V3a1 1 0 00-1-1H6zm12 7a1 1 0 00-1 1v6H3v-6a1 1 0 00-1-1H1v7a2 2 0 002 2h14a2 2 0 002-2v-7h-1z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm flex items-center justify-between">
            <div>
                <p class="text-sm font-medium text-gray-600">Rata-rata Penjualan</p>
                <p class="text-2xl font-bold text-gray-900"><?= esc($stats['rata_rata_penjualan']) ?></p>
            </div>
            <div class="bg-pink-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3" />
                    <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none" />
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
                        <?php foreach ($branch_options as $bOption): ?>
                            <option value="<?= esc($bOption) ?>"><?= esc($bOption) ?></option>
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
        </form>
    </section>

    <section class="bg-white rounded-lg shadow p-6">
        <h2 class="text-lg font-bold text-gray-900 mb-4">Penjualan per Cabang</h2>
        <div class="overflow-x-auto">
            <table aria-label="Penjualan per Cabang table" role="table" class="min-w-full border-separate border-spacing-y-2">
                <thead>
                    <tr>
                        <th scope="col" class="text-left text-gray-700 font-semibold p-3">Cabang</th>
                        <th scope="col" class="text-left text-gray-700 font-semibold p-3">Total Penjualan</th>
                        <th scope="col" class="text-left text-gray-700 font-semibold p-3">Transaksi</th>
                        <th scope="col" class="text-left text-gray-700 font-semibold p-3">Rata-rata</th>
                        <th scope="col" class="text-left text-gray-700 font-semibold p-3">Growth</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($branches as $branch): ?>
                    <tr class="bg-white shadow rounded-lg">
                        <td class="flex items-center gap-3 p-3">
                            <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                            <div>
                                <div class="font-semibold text-gray-900"><?= esc($branch['nama']) ?></div>
                                <div class="text-xs text-gray-400"><?= esc($branch['kode']) ?></div>
                            </div>
                        </td>
                        <td class="p-3"><?= esc($branch['total']) ?></td>
                        <td class="p-3"><?= number_format($branch['transaksi'], 0, '', '.') ?></td>
                        <td class="p-3"><?= esc($branch['rata']) ?></td>
                        <td class="p-3 <?= (str_starts_with($branch['growth'], '+')) ? 'text-green-500' : 'text-red-500' ?> font-semibold">
                            <?= esc($branch['growth']) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </section>

</div>

<?= $this->endSection() ?>
