<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;

class SalesReportController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Laporan Penjualan',
            'breadcrumb' => ['Dashboard' => base_url('superadmin/dashboard'), 'Penjualan' => ''],
            'stats' => [
                'total_penjualan' => 'Rp 2.4M',
                'jumlah_transaksi' => '2.140',
                'rata_rata_penjualan' => 'Rp 1,12 JT',
            ],
            'branches' => [
                ['nama' => 'Jakarta Pusat', 'kode' => 'JKT001', 'total' => 'Rp 2.2M', 'transaksi' => 2198, 'rata' => 'Rp 159K', 'growth' => '-2.3%'],
                ['nama' => 'Jakarta Pusat', 'kode' => 'JKT001', 'total' => 'Rp 1M', 'transaksi' => 2987, 'rata' => 'Rp 159K', 'growth' => '+15.2%'],
                ['nama' => 'Jakarta Pusat', 'kode' => 'JKT001', 'total' => 'Rp 3M', 'transaksi' => 4312, 'rata' => 'Rp 159K', 'growth' => '+15.2%'],
                ['nama' => 'Jakarta Pusat', 'kode' => 'JKT001', 'total' => 'Rp 1.2M', 'transaksi' => 1123, 'rata' => 'Rp 159K', 'growth' => '-2.3%'],
            ],
            'branch_options' => ['Jakarta Pusat', 'Surabaya', 'Bandung'],
        ];

        return view('superAdmin/sales_report', $data);
    }
}
