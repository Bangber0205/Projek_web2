<?= $this->extend('layouts/owner') ?>
<?= $this->section('content') ?>

<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Edit Barang</h1>
    <nav class="text-sm text-gray-500 mt-2 breadcrumb-border">
        <span>Dashboard</span> > <span>Barang</span> > <span>Edit Barang</span>
    </nav>
</div>
<!-- line -->
<div class="border-t-1 border-black/40 my-5"></div>

<!-- form -->
<form action="<?= base_url('owner/stok-barang/update/' . $stok['id']) ?>" method="post" class="space-y-8 max-w-full sm:max-w-full bg-white p-8 rounded-lg border border-gray-200 shadow-md">
    <?= csrf_field() ?>
    <div class="">
        <h2 class="text-xl font-semibold text-gray-900 mb-2">Informasi Barang</h2>
        <p class="text-sm text-gray-500 leading-relaxed">Masukkan detail informasi barang baru</p>
    </div>

    <!-- Kode Barang -->
    <div class="flex flex-col">
        <label for="kode_barang" class="mb-2 font-semibold text-gray-900">
            Kode Barang <span class="text-red-600">*</span>
        </label>
        <input type="text" id="kode_barang" name="kode_barang" placeholder="Masukkan kode barang" required
            value="<?= $stok['kode_barang'] ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">(Terdiri dari 2-3 huruf dan diakhiri dengan angka, contoh : SBK-1)</p>
    </div>

    <!-- Nama Barang -->
    <div class="flex flex-col">
        <label for="nama_barang" class="mb-2 font-semibold text-gray-900">
            Nama Barang <span class="text-red-600">*</span>
        </label>
        <input type="text" id="nama_barang" name="nama_barang" placeholder="Masukkan nama barang" required
            value="<?= $stok['nama_barang'] ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">Contoh: Pasta gigi, Sikat gigi, Mie instan</p>
    </div>

    <!-- Kategori -->
    <div class="flex flex-col">
        <label for="kategori" class="mb-2 font-semibold text-gray-900">
            Kategori <span class="text-red-600">*</span>
        </label>
        <input type="text" id="kategori" name="kategori" placeholder="Masukkan nama kategori" required
            value="<?= $stok['kategori'] ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
    </div>

    <!-- Harga per item -->
    <div class="flex flex-col">
        <label for="harga" class="mb-2 font-semibold text-gray-900">
            Harga per item <span class="text-red-600">*</span>
        </label>
        <input type="number" id="harga" name="harga" placeholder="Masukkan harga per item (Rp.)" required min="0"
            value="<?= $stok['harga'] ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
    </div>

    <!-- Jumlah Barang -->
    <div class="flex flex-col">
        <label for="jumlah_stok" class="mb-2 font-semibold text-gray-900">
            Jumlah Barang <span class="text-red-600">*</span>
        </label>
        <input type="number" id="jumlah_stok" name="jumlah_stok" placeholder="Masukkan jumlah barang" required min="0"
            value="<?= $stok['jumlah_stok'] ?>"
            class="w-full border border-gray-300 rounded-md px-4 py-3 placeholder-gray-400 transition focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"/>
        <p class="text-xs text-gray-400 mt-1">Jumlah dari stock barang</p>
    </div>

    <!-- Tombol Aksi -->
    <div class="flex gap-6">
        <!-- submit -->
        <button type="submit" class="w-50 sm:w-auto inline-flex items-center justify-center px-20 py-3 bg-blue-600 text-white rounded-lg shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-400 transition">Simpan Perubahan</button>
    </div>
</form>

<?= $this->endSection() ?>