<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<!-- Judul Utama & Breadcrumb -->
<div class="mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Daftar Cabang</h1>
    <nav class="text-sm text-gray-400 mt-1 border-b border-gray-300 pb-3">
        <span>Dashboard</span> > <span>Daftar Cabang</span>
    </nav>
</div>

<!-- Statistik Ringkas -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Total Cabang -->
    <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm">
        <div class="flex items-center">
            <div>
                <p class="text-sm font-medium text-gray-600">Total Cabang</p>
                <p class="text-2xl font-bold text-gray-900"><?= $totalBranches ?? 0 ?></p>
            </div>
            <div class="bg-blue-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.84L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.84l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Cabang Aktif -->
    <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm">
        <div class="flex items-center">
            <div>
                <p class="text-sm font-medium text-gray-600">Cabang Aktif</p>
                <p class="text-2xl font-bold text-gray-900"><?= $activeBranches ?? 0 ?></p>
            </div>
            <div class="bg-green-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>

    <!-- Cabang Non-Aktif -->
    <div class="bg-white border border-[#E5E7EB] p-6 rounded-lg shadow-sm">
        <div class="flex items-center">
            <div>
                <p class="text-sm font-medium text-gray-600">Cabang Non-Aktif</p>
                <p class="text-2xl font-bold text-gray-900"><?= $inactiveBranches ?? 0 ?></p>
            </div>
            <div class="bg-red-100 p-3 rounded-lg ml-auto">
                <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
            </div>
        </div>
    </div>
</div>

<!-- Bar Aksi & Pencarian -->
<div class="flex flex-col md:flex-row justify-between items-center mb-6 gap-4">
    <a href="<?= base_url('superadmin/branches/create') ?>" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd"/>
        </svg>
        Tambah Cabang
    </a>

    <form action="<?= base_url('superadmin/branches') ?>" method="GET" class="flex items-center gap-2">
        <input type="text" name="keyword" value="<?= esc(request()->getGet('keyword')) ?>" placeholder="Masukkan kata kunci..." class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"/>
            </svg>
            Cari
        </button>
    </form>
</div>

<!-- Flash Messages -->
<?php if (session()->has('message')): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
        <?= session('message') ?>
    </div>
<?php endif; ?>

<?php if (session()->has('error')): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <?= session('error') ?>
    </div>
<?php endif; ?>

<!-- Daftar Cabang Table -->
<div class="overflow-x-auto bg-white rounded-lg shadow-sm border border-gray-100">
    <table class="min-w-full border-collapse table-fixed text-sm font-sans text-gray-700">
        <thead class="bg-gray-50">
            <tr>
                <th class="w-20 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">ID CABANG</th>
                <th class="w-40 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">NAMA CABANG</th>
                <th class="w-64 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">ALAMAT</th>
                <th class="w-36 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">KONTAK CABANG</th>
                <th class="w-20 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">STATUS</th>
                <th class="w-28 px-6 py-4 font-semibold text-left capitalize border-b border-gray-200">TANGGAL PERESMIAN</th>
                <th class="w-12 px-6 py-4 font-semibold text-left border-b border-gray-200">...</th>
            </tr>
        </thead>
        <tbody role="list">
            <?php if(!empty($branches) && is_array($branches)): ?>
                <?php $index = 0; ?>
                <?php foreach($branches as $branch): ?>
                    <?php $index++; ?>
                    <tr class="<?= $index % 2 === 1 ? 'bg-white' : 'bg-gray-50' ?> hover:bg-gray-100">
                        <td class="px-6 py-4 whitespace-nowrap"><?= esc($branch['id']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= esc($branch['name']) ?></td>
                        <td class="px-6 py-4 whitespace-nowrap max-w-xs truncate"><?= esc($branch['location'] ?? '') ?></td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= esc($branch['contact'] ?? '') ?></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <?php if(isset($branch['status'])): ?>
                                <?php if($branch['status'] === 'aktif'): ?>
                                    <span class="text-green-500 font-semibold">Aktif</span>
                                <?php else: ?>
                                    <span class="text-red-500 font-semibold">Non-Aktif</span>
                                <?php endif; ?>
                            <?php endif; ?>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap"><?= esc($branch['opening_date'] ?? '') ?></td>
                        <td class="relative whitespace-nowrap">
                            <button onclick="toggleOptionsMenu(this)" class="text-gray-500 hover:text-gray-900 focus:outline-none" aria-haspopup="true" aria-expanded="false" aria-label="More options">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v.01M12 12v.01M12 18v.01"/>
                                </svg>
                            </button>
                            <div class="absolute right-0 mt-2 w-28 bg-white rounded-md shadow-lg border border-gray-200 z-20 hidden" role="menu">
                                <a href="<?= base_url('superadmin/branches/edit/' . $branch['id']) ?>" class="block px-4 py-2 text-sm text-blue-600 hover:bg-blue-100" role="menuitem">Edit</a>
                                <form action="<?= base_url('superadmin/branches/delete/' . $branch['id']) ?>" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus cabang ini?');">
                                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-100" role="menuitem">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" class="text-center text-gray-400 py-6">Tidak ada data cabang</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script>
function toggleOptionsMenu(button) {
    // Find the menu div relative to the button via parent node
    const menu = button.parentNode.querySelector('div[role="menu"]');
    if (!menu) {
        console.log('Dropdown menu not found');
        return;
    }
    const isHidden = menu.classList.contains('hidden');
    // Close all other open menus
    document.querySelectorAll('div[role="menu"]').forEach(m => {
        if (m !== menu) {
            m.classList.add('hidden');
            // Reset aria-expanded of other buttons
            const btn = m.parentNode.querySelector('button[aria-haspopup="true"]');
            if (btn) btn.setAttribute('aria-expanded', 'false');
        }
    });
    if (isHidden) {
        // Remove hidden class to show menu
        menu.classList.remove('hidden');
        button.setAttribute('aria-expanded', 'true');
        // Close menu when clicking outside
        const closeMenu = (event) => {
            if (!menu.contains(event.target) && event.target !== button) {
                menu.classList.add('hidden');
                button.setAttribute('aria-expanded', 'false');
                document.removeEventListener('click', closeMenu);
            }
        };
        // Use capture phase to handle before other click handlers
        document.addEventListener('click', closeMenu, true);
    } else {
        // Add hidden class to hide menu
        menu.classList.add('hidden');
        button.setAttribute('aria-expanded', 'false');
    }
}
</script>

<?= $this->endSection() ?>
