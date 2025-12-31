<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\BranchModel;

class KeuanganCabangController extends BaseController
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

        // Generate reports based on actual branches from database
        $reports = [];

        if (!empty($branches)) {
            foreach ($branches as $branch) {
                // Generate 3 entries for different dates but with zero values since no transactions exist
                for ($i = 0; $i < 3; $i++) {
                    $date = date('Y-m-d', strtotime("-$i days"));
                    $reports[] = [
                        'cabang' => $branch['name'],
                        'tanggal' => $date,
                        'total_penjualan' => 'Rp 0', // Since no sales data exists, set to 0
                        'total_modal' => 'Rp 0', // Since no sales data exists, modal is also 0
                        'total_keuntungan' => 'Rp 0', // Since no sales data exists, profit is also 0
                        'jumlah_transaksi' => 0, // Since no sales data exists, transactions are also 0
                    ];
                }
            }
        }

        // Apply filters
        $filteredReports = $reports;

        if ($cabang) {
            $filteredReports = array_filter($filteredReports, function($report) use ($cabang) {
                return $report['cabang'] === $cabang;
            });
        }

        if ($dariTanggal) {
            $filteredReports = array_filter($filteredReports, function($report) use ($dariTanggal) {
                return $report['tanggal'] >= $dariTanggal;
            });
        }

        if ($sampaiTanggal) {
            $filteredReports = array_filter($filteredReports, function($report) use ($sampaiTanggal) {
                return $report['tanggal'] <= $sampaiTanggal;
            });
        }

        $total_penjualan = 0;
        $total_keuntungan = 0;
        $total_transaksi = 0;

        foreach ($filteredReports as $report) {
            $total_penjualan += (int)str_replace(['Rp ', '.'], '', $report['total_penjualan']);
            $total_keuntungan += (int)str_replace(['Rp ', '.'], '', $report['total_keuntungan']);
            $total_transaksi += $report['jumlah_transaksi'];
        }

        $rata_rata_penjualan = $total_transaksi > 0 ? $total_penjualan / $total_transaksi : 0;

        $data = [
            'title' => 'Keuangan Cabang',
            'breadcrumb' => [
                'Dashboard' => base_url('superadmin/dashboard'),
                'Laporan Keuangan Cabang' => '',
            ],
            'stats' => [
                'total_penjualan' => 'Rp ' . number_format($total_penjualan, 0, ',', '.'),
                'total_keuntungan' => 'Rp ' . number_format($total_keuntungan, 0, ',', '.'),
                'rata_rata_penjualan' => 'Rp ' . number_format($rata_rata_penjualan, 0, ',', '.'),
            ],
            'branch_options' => $branch_options,
            'reports' => array_values($filteredReports),
            'filters' => [
                'cabang' => $cabang,
                'dari_tanggal' => $dariTanggal,
                'sampai_tanggal' => $sampaiTanggal,
            ],
        ];

        return view('superAdmin/keuangan_cabang', $data);
    }
}
