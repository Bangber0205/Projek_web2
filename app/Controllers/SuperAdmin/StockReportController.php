<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\UserModel;
use App\Models\CategoryModel;
use Config\Services;
use App\Models\BranchModel;

class StockReportController extends BaseController
{
    public function index()
    {
        $itemModel = new ItemModel();
        $branchModel = new BranchModel();

        // Example logic for data:
        // Total Produk: count of unique products
        $totalProduk = $itemModel->countAllResults();

        // Stok Menipis: products with stock below threshold (e.g., 10)
        $stokMenipis = $itemModel->where('jumlah <', 10)->where('jumlah >', 0)->countAllResults();

        // Stok Habis: products with stock = 0
        $stokHabis = $itemModel->where('jumlah', 0)->countAllResults();

        // Get branches list for filter dropdown
        // Branch filtering removed because items table has no branch association
        $selectedBranch = null;

        // Define $branches for branch options
        $branches = $branchModel->findColumn('name');

        $itemsQuery = $itemModel->select(['items.nama_barang as product_name', 'items.kode_barang as product_code', 'categories.name as category_name', 'jumlah'])
            ->join('categories', 'items.kategori = categories.name', 'left');

$items = $itemsQuery->findAll();

// Add 'branch_name' key with empty string to each item to avoid undefined array key error in view
foreach ($items as &$item) {
    if (!array_key_exists('branch_name', $item)) {
        $item['branch_name'] = '';
    }
}
unset($item);

// Prepare breadcrumb
$breadcrumb = [
    'Dashboard' => base_url('superadmin/dashboard'),
    'Stok' => null
];

// Prepare stats array for view
$stats = [
    'total_produk' => $totalProduk,
    'stok_menipis' => $stokMenipis,
    'stok_habis' => $stokHabis
];

return view('superAdmin/stock_report', [
    'title' => 'Laporan Stok',
    'breadcrumb' => $breadcrumb,
    'stats' => $stats,
    'branch_options' => $branches,
    'items' => $items,
    'selectedBranch' => $selectedBranch,
]);
    }
}

