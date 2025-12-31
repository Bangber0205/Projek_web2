<?= $this->extend('layouts/owner') ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Stok Barang</h1>
    <nav class="text-sm text-gray-500 mt-2 breadcrumb-border">
        <span>Dashboard</span> > <span>Barang</span> > <span>Stok Barang</span>
    </nav>
</div>
<!-- line -->
<div class="border-t-1 border-black/40 my-5"></div>

<!-- statistik -->
<div class="grid grid-cols-3 gap-4">
    <?= view('components/card-stats', [
        'title' => 'Total Produk',
        'value' => '204',
        'bg_icon' => 'bg-[#DBEAFE]',
        'icon' => '
            <svg width="18" height="16" viewBox="0 0 18 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1.125 0C1.74727 0 2.25 0.502734 2.25 1.125V12.9375C2.25 13.2469 2.50312 13.5 2.8125 13.5H16.875C17.4973 13.5 18 14.0027 18 14.625C18 15.2473 17.4973 15.75 16.875 15.75H2.8125C1.25859 15.75 0 14.4914 0 12.9375V1.125C0 0.502734 0.502734 0 1.125 0ZM4.5 3.375C4.5 2.75273 5.00273 2.25 5.625 2.25H12.375C12.9973 2.25 13.5 2.75273 13.5 3.375C13.5 3.99727 12.9973 4.5 12.375 4.5H5.625C5.00273 4.5 4.5 3.99727 4.5 3.375ZM5.625 5.625H10.125C10.7473 5.625 11.25 6.12773 11.25 6.75C11.25 7.37227 10.7473 7.875 10.125 7.875H5.625C5.00273 7.875 4.5 7.37227 4.5 6.75C4.5 6.12773 5.00273 5.625 5.625 5.625ZM5.625 9H14.625C15.2473 9 15.75 9.50273 15.75 10.125C15.75 10.7473 15.2473 11.25 14.625 11.25H5.625C5.00273 11.25 4.5 10.7473 4.5 10.125C4.5 9.50273 5.00273 9 5.625 9Z" fill="#374151"/>
            </svg>'
    ]) ?>

    <?= view('components/card-stats', [
        'title' => 'Stok Menipis',
        'value' => '39',
        'bg_icon' => 'bg-[#DCFCE7]',
        'icon' => '
            <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0.75 6.4375V1.2375C0.75 1.10821 0.800571 0.984209 0.890589 0.892785C0.980606 0.801361 1.1027 0.75 1.23 0.75H6.1724C6.28681 0.749991 6.39745 0.791484 6.4844 0.867L9.0156 3.0705C9.10255 3.14602 9.21319 3.18751 9.3276 3.1875H16.27C16.333 3.1875 16.3955 3.20011 16.4537 3.22461C16.5119 3.24911 16.5648 3.28502 16.6094 3.33029C16.654 3.37555 16.6893 3.4293 16.7135 3.48844C16.7376 3.54759 16.75 3.61098 16.75 3.675V6.4375M0.75 6.4375V13.2625C0.75 13.3918 0.800571 13.5158 0.890589 13.6072C0.980606 13.6986 1.1027 13.75 1.23 13.75H16.27C16.3973 13.75 16.5194 13.6986 16.6094 13.6072C16.6994 13.5158 16.75 13.3918 16.75 13.2625V6.4375M0.75 6.4375H16.75" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>'
    ]) ?>

    <?= view('components/card-stats', [
        'title' => 'Stok Habis',
        'value' => '10',
        'bg_icon' => 'bg-[#FFE2E3]',
        'icon' => '
            <svg width="20" height="19" viewBox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10 11.3003C9.73478 11.3003 9.48043 11.1949 9.29289 11.0074C9.10536 10.8199 9 10.5655 9 10.3003V5.30029C9 5.03508 9.10536 4.78072 9.29289 4.59319C9.48043 4.40565 9.73478 4.30029 10 4.30029C10.2652 4.30029 10.5196 4.40565 10.7071 4.59319C10.8946 4.78072 11 5.03508 11 5.30029V10.3003C11 10.5655 10.8946 10.8199 10.7071 11.0074C10.5196 11.1949 10.2652 11.3003 10 11.3003Z" fill="black"/>
            <path d="M8.94727 13.4583C8.94727 13.179 9.05821 12.9112 9.25568 12.7137C9.45316 12.5162 9.72099 12.4053 10.0003 12.4053C10.2795 12.4053 10.5474 12.5162 10.7448 12.7137C10.9423 12.9112 11.0533 13.179 11.0533 13.4583C11.0533 13.7375 10.9423 14.0054 10.7448 14.2029C10.5474 14.4003 10.2795 14.5113 10.0003 14.5113C9.72099 14.5113 9.45316 14.4003 9.25568 14.2029C9.05821 14.0054 8.94727 13.7375 8.94727 13.4583Z" fill="black"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M13.6075 2.14225L19.4835 12.8623C20.9955 15.6213 19.0105 19.0002 15.8765 19.0002H4.12448C0.99048 19.0002 -0.99552 15.6202 0.51748 12.8612L6.39348 2.14125C7.95948 -0.71375 12.0415 -0.71375 13.6075 2.14125V2.14225ZM11.8035 3.14225C11.0215 1.71325 8.97948 1.71325 8.19748 3.14225L2.32048 13.8603C1.56348 15.2403 2.55648 16.9293 4.12348 16.9293H15.8755C17.4425 16.9293 18.4355 15.2392 17.6785 13.8592L11.8035 3.14225Z" fill="black"/>
            </svg>'
    ]) ?>
</div>

<!-- search form -->
<div class="flex items-center space-x-4 mt-6">
    <form method="GET" action="<?= base_url('owner/stok-barang') ?>" class="flex items-center space-x-2">
        <input type="text" name="search" value="<?= esc($search_keyword ?? '') ?>" placeholder="Cari berdasarkan kode, nama, atau kategori..." class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500">
            Cari
        </button>
        <?php if (!empty($search_keyword)): ?>
            <a href="<?= base_url('owner/stok-barang') ?>" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600">
                Reset
            </a>
        <?php endif; ?>
    </form>

    <a href="<?= base_url('owner/stok-barang/create') ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        + Tambah Barang
    </a>
</div>

<!-- tabel -->
    <div class="overflow-x-auto mt-6 shadow-md">
        <table class="w-full text-left border-collapse bg-white">
            <thead class="border-b border-gray-300">
                <tr class="text-black text-sm bg-gray-50">
                    <th class="py-5 px-4 font-medium bg-gray-200">Kode Barang</th>
                    <th class="py-3 px-4 font-medium bg-gray-200">Nama Barang</th>
                    <th class="py-3 px-8 font-medium bg-gray-200">Kategori</th>
                    <th class="py-3 px-7 font-medium bg-gray-200">Harga Jual</th>
                    <th class="py-3 px-4 font-medium bg-gray-200">Jumlah Stok</th>
                    <th class="py-3 px-18 font-medium bg-gray-200">Aksi</th>
                </tr>
            </thead>

            <tbody>

                <?php if (!empty($stok)): ?>
                    <?php foreach ($stok as $index => $s): ?>
                        <tr class="<?= $index % 2 == 1 ? 'bg-gray-50' : '' ?>">

                            <!-- Kode -->
                            <td class="py-4 px-4 text-gray-700">
                                <?= $s['kode_barang'] ?>
                            </td>

                            <!-- Nama -->
                            <td class="py-4 px-4 text-gray-700">
                                <?= $s['nama_barang'] ?>
                            </td>

                            <!-- Kategori -->
                            <td class="py-4 px-7 text-gray-700">
                                <?= $s['kategori'] ?>
                            </td>

                            <!-- Harga -->
                            <td class="py-4 px-7 text-gray-800 font-medium">
                                Rp <?= number_format($s['harga'], 0, ',', '.') ?>
                            </td>

                            <!-- Stok -->
                            <td class="py-4 px-11 text-gray-700">
                                <?= $s['jumlah_stok'] ?>
                            </td>

                            <!-- Aksi -->
                            <td class="py-4 px-7">
                                <div class="flex gap-3">
                                    <!-- Edit -->
                                    <a href="<?= base_url('owner/stok-barang/edit/' . $s['id']) ?>"
                                    class="px-3 py-1 rounded-lg text-white bg-blue-600">
                                        Edit
                                    </a>

                                    <!-- Hapus -->
                                    <a href="<?= base_url('owner/stok-barang/delete/' . $s['id']) ?>"
                                    class="px-3 py-1 rounded-lg text-white bg-red-600"
                                    onclick="return confirm('Hapus barang ini?')">
                                        Hapus
                                    </a>
                                </div>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" class="text-center py-6 text-gray-500">
                            Belum ada data stok barang.
                        </td>
                    </tr>
                <?php endif; ?>

            </tbody>
        </table>
    </div>


<?= $this->endSection() ?>