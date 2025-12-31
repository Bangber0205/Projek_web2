<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class RiwayatTransaksi extends BaseController
{
    public function index()
    {
        return view('owner/riwayat_transaksi', [
            'title_page' => 'Riwayat Transaksi'
        ]);
    }
}
