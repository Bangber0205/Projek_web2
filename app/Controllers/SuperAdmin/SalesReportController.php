<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class SalesReportController extends BaseController
{
    public function index()
    {
        $cabang = $this->request->getGet('cabang');
        $dariTanggal = $this->request->getGet('dari_tanggal');
        $sampaiTanggal = $this->request->getGet('sampai_tanggal');

        // Get actual branch data from database
        $branchModel = new BranchModel();
        $branches = $branchModel->findAll();

        // Create branch options for filter dropdown
        $branch_options = array_column($branches, 'name');

        // Generate sales data based on actual branches from database
        $allBranches = [];

        if (!empty($branches)) {
            foreach ($branches as $branch) {
                // Create sales report entry for each branch
                $allBranches[] = [
                    'nama' => $branch['name'],
                    'kode' => $branch['code'],
                    'total' => 'Rp 0', // Since no sales data exists, set to 0
                    'transaksi' => 0, // Since no sales data exists, set to 0
                    'rata' => 'Rp 0', // Since no sales data exists, set to 0
                    'growth' => '0%', // Since no sales data exists, set to 0%
                    'tanggal' => date('Y-m-d'), // Current date since no sales data exists
                ];
            }
        }

        $filteredBranches = $allBranches;

        if ($cabang) {
            $filteredBranches = array_filter($filteredBranches, function($branch) use ($cabang) {
                return $branch['nama'] === $cabang;
            });
        }

        if ($dariTanggal) {
            $filteredBranches = array_filter($filteredBranches, function($branch) use ($dariTanggal) {
                return $branch['tanggal'] >= $dariTanggal;
            });
        }

        if ($sampaiTanggal) {
            $filteredBranches = array_filter($filteredBranches, function($branch) use ($sampaiTanggal) {
                return $branch['tanggal'] <= $sampaiTanggal;
            });
        }

        $totalPenjualan = 0;
        $totalTransaksi = 0;
        foreach ($filteredBranches as $branch) {
            $totalStr = str_replace(['Rp ', 'M', 'JT', 'K'], '', $branch['total']);
            if (strpos($branch['total'], 'M') !== false) {
                $totalPenjualan += (float)$totalStr * 1000000;
            } elseif (strpos($branch['total'], 'JT') !== false) {
                $totalPenjualan += (float)$totalStr * 1000000;
            } elseif (strpos($branch['total'], 'K') !== false) {
                $totalPenjualan += (float)$totalStr * 1000;
            }
            $totalTransaksi += $branch['transaksi'];
        }

        $rataRata = $totalTransaksi > 0 ? $totalPenjualan / $totalTransaksi : 0;

        $data = [
            'title' => 'Laporan Penjualan',
            'breadcrumb' => ['Dashboard' => base_url('superadmin/dashboard'), 'Penjualan' => ''],
            'stats' => [
                'total_penjualan' => 'Rp ' . number_format($totalPenjualan / 1000000, 1) . 'M',
                'jumlah_transaksi' => number_format($totalTransaksi),
                'rata_rata_penjualan' => 'Rp ' . number_format($rataRata / 1000, 0) . 'K',
            ],
            'branches' => array_values($filteredBranches),
            'branch_options' => $branch_options,
            'filters' => [
                'cabang' => $cabang,
                'dari_tanggal' => $dariTanggal,
                'sampai_tanggal' => $sampaiTanggal,
            ],
        ];

        return view('superAdmin/sales_report', $data);
    }
}
