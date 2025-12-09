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
        $totalProduk = $itemModel->countAllResults();
        $stokMenipis = $itemModel->where('jumlah <', 10)->where('jumlah >', 0)->countAllResults();
        $stokHabis = $itemModel->where('jumlah', 0)->countAllResults();
        $selectedBranch = null;
        $branches = $branchModel->findColumn('name');
        $itemsQuery = $itemModel->select(['items.nama_barang as product_name', 'items.kode_barang as product_code', 'categories.name as category_name', 'jumlah'])
            ->join('categories', 'items.kategori = categories.name', 'left');
        $items = $itemsQuery->findAll();
foreach ($items as &$item) {
    if (!array_key_exists('branch_name', $item)) {
        $item['branch_name'] = '';
    }
}
unset($item);
$breadcrumb = [
    'Dashboard' => base_url('superadmin/dashboard'),
    'Stok' => null
];
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

