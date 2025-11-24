<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;

class KeuanganCabangController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Keuangan Cabang',
            'breadcrumb' => [
                'Dashboard' => base_url('superadmin/dashboard'),
                'Laporan Keuangan Cabang' => '',
            ],
            'stats' => [
                'total_penjualan' => 'Rp 120.500.000',
                'total_keuntungan' => 'Rp 85.237.000',
                'rata_rata_penjualan' => 'Rp 70.000.000',
            ],
            'branch_options' => ['Cabang 1', 'Cabang 2', 'Cabang 3'],
            'jenis_laporan_options' => ['Harian', 'Mingguan', 'Bulanan', 'Custom'],
            'reports' => [
                [
                    'cabang' => 'Cabang 1',
                    'tanggal' => '2025-09-25',
                    'total_penjualan' => 'Rp 100.000.000',
                    'total_modal' => 'Rp 60.000.000',
                    'total_keuntungan' => 'Rp 40.000.000',
                    'jumlah_transaksi' => 120,
                ],
                [
                    'cabang' => 'Cabang 2',
                    'tanggal' => '2025-09-25',
                    'total_penjualan' => 'Rp 150.000.000',
                    'total_modal' => 'Rp 100.000.000',
                    'total_keuntungan' => 'Rp 50.000.000',
                    'jumlah_transaksi' => 180,
                ],
                [
                    'cabang' => 'Cabang 3',
                    'tanggal' => '2025-09-25',
                    'total_penjualan' => 'Rp 80.000.000',
                    'total_modal' => 'Rp 50.000.000',
                    'total_keuntungan' => 'Rp 30.000.000',
                    'jumlah_transaksi' => 90,
                ],
            ],
        ];

        return view('superAdmin/keuangan_cabang', $data);
    }
}
