<?= $this->extend('layouts/owner') ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Input Penjualan Harian</h1>
    <nav class="text-sm text-gray-500 mt-2 breadcrumb-border">
        <span>Dashboard</span> > <span>Penjualan</span> > <span>Input Penjualan Harian</span>
    </nav>
</div>

<div class="border-t border-black/40 my-5"></div>

<!-- Search Bar -->
<div class="flex justify-end mb-4">
    <form method="GET" class="relative">
        <input 
            type="text" 
            name="search" 
            placeholder="Cari nama barang..."
            value="<?= esc($keyword) ?>"
            class="border border-gray-400 rounded-xl px-4 py-2 w-70 focus:outline-none focus:ring focus:ring-gray-300"
        >
        <button class="absolute right-2 top-2 text-gray-500 pt-1 pr-3">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M16.6 18L10.3 11.7C9.8 12.1 9.225 12.4167 8.575 12.65C7.925 12.8833 7.23333 13 6.5 13C4.68333 13 3.146 12.3707 1.888 11.112C0.63 9.85333 0.000667196 8.316 5.29101e-07 6.5C-0.000666138 4.684 0.628667 3.14667 1.888 1.888C3.14733 0.629333 4.68467 0 6.5 0C8.31533 0 9.853 0.629333 11.113 1.888C12.373 3.14667 13.002 4.684 13 6.5C13 7.23333 12.8833 7.925 12.65 8.575C12.4167 9.225 12.1 9.8 11.7 10.3L18 16.6L16.6 18ZM6.5 11C7.75 11 8.81267 10.5627 9.688 9.688C10.5633 8.81333 11.0007 7.75067 11 6.5C10.9993 5.24933 10.562 4.187 9.688 3.313C8.814 2.439 7.75133 2.00133 6.5 2C5.24867 1.99867 4.18633 2.43633 3.313 3.313C2.43967 4.18967 2.002 5.252 2 6.5C1.998 7.748 2.43567 8.81067 3.313 9.688C4.19033 10.5653 5.25267 11.0027 6.5 11Z" fill="#5F5F5F"/>
            </svg>
        </button>
    </form>
</div>

<!-- tabel -->
<div class="overflow-x-auto mt-4 shadow-md rounded-lg">
    <table class="w-full text-left border-collapse bg-white">
        <thead class="border-b border-gray-300">
            <tr class="text-black text-sm">
                <th class="py-4 px-4 pl-8 font-medium bg-gray-200">Kode</th>
                <th class="py-4 px-4 font-medium bg-gray-200">Nama</th>
                <th class="py-4 px-4 font-medium bg-gray-200">Kategori</th>
                <th class="py-4 px-4 font-medium bg-gray-200">Harga Jual</th>
                <th class="py-4 px-4 font-medium bg-gray-200">Jumlah Stok</th>
                <th class="py-4 px-4 font-medium bg-gray-200">Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php if (!empty($stok)): ?>
                <?php foreach ($stok as $i => $s): ?>
                    <tr class="<?= $i % 2 == 1 ? 'bg-gray-50' : '' ?>">
                        <td class="py-4 px-4 pl-8 text-gray-700"><?= $s['kode'] ?></td>
                        <td class="py-4 px-4 text-gray-700"><?= $s['nama'] ?></td>
                        <td class="py-4 px-4 text-gray-700"><?= $s['kategori'] ?></td>
                        <td class="py-4 px-4 text-gray-800 font-medium">
                            Rp <?= number_format($s['harga'], 0, ',', '.') ?>/item
                        </td>
                        <td class="py-4 px-4 text-gray-700"><?= $s['stok'] ?> Barang</td>
                        <td>
                            <form action="<?= base_url('owner/input-penjualan/add') ?>" method="post" class="flex items-center gap-1">
                                <?= csrf_field() ?>
                                <input type="hidden" name="kode" value="<?= $s['kode'] ?>">
                                <input type="hidden" name="nama" value="<?= $s['nama'] ?>">
                                <input type="hidden" name="harga" value="<?= $s['harga'] ?>">

                                <input type="number" name="qty" value="1" min="1"
                                    class="w-14 border rounded-lg px-2 py-1 text-sm">

                                <button type="submit"
                                    class="text-sm px-3 py-1 bg-blue-600 text-white rounded-lg">
                                    +
                                </button>
                            </form>
                                                    
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-500">
                        Barang tidak ditemukan.
                    </td>
                </tr>
            <?php endif; ?>

        </tbody>
    </table>
</div>

<!-- Keranjang -->
<h2 class="mt-10 text-xl font-semibold text-gray-900">Keranjang</h2>
<div class="mt-3 w-full rounded-md bg-white shadow-md p-4">
    <?php $cart = session('cart'); ?>

    <?php if ($cart): ?>
        <ul class="space-y-2">
            <?php $total = 0; ?>
            <?php foreach ($cart as $item): ?>
                <?php $total += $item['subtotal']; ?>
                <li class="flex justify-between items-center border-b pb-2">
                    <div class="flex-1">
                        <span class="font-medium"><?= $item['nama'] ?></span>
                        <div class="text-sm text-gray-500">
                            <?= $item['qty'] ?> × Rp <?= number_format($item['harga'], 0, ',', '.') ?>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="font-medium">Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></span>
                        <!-- Tombol Hapus -->
                        <form action="<?= base_url('owner/input-penjualan/remove') ?>" method="post" class="inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="kode" value="<?= $item['kode'] ?>">
                            <button type="submit" 
                                    class="text-red-600 hover:text-red-800 text-sm px-2 py-1 border border-red-300 rounded hover:bg-red-50 transition"
                                    title="Hapus item">
                                ×
                            </button>
                        </form>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="mt-3 pt-3 flex justify-between font-semibold text-base">
            <span>Total</span>
            <span>Rp <?= number_format($total, 0, ',', '.') ?></span>
        </div>

        <div class="flex gap-3 mt-3">
            <!-- Tombol Kosongkan Keranjang -->
            <form action="<?= base_url('owner/input-penjualan/clear') ?>" method="post" class="flex-1">
                <?= csrf_field() ?>
                <button type="submit" 
                        class="w-full bg-white-100 text-gray-700 border border-gray-300 py-2 rounded-lg hover:bg-gray-200 transition">
                    Kosongkan Keranjang
                </button>
            </form>
            
            <!-- Tombol Simpan Transaksi -->
            <form action="<?= base_url('owner/input-penjualan/save') ?>" method="post" class="flex-1">
                <?= csrf_field() ?>
                <button class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition">
                    Simpan Transaksi
                </button>
            </form>
        </div>
    <?php else: ?>
        <p class="text-sm text-gray-500">Keranjang masih kosong.</p>
    <?php endif; ?>
</div>

<?= $this->endSection() ?>