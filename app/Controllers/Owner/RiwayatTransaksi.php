<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class RiwayatTransaksi extends BaseController
{
    public function index()
    {
        $transaksi = [
            [
                'nama_barang' => 'Kopi Arabica',
                'kode_barang' => 'KFM102',
                'harga_satuan' => 32000,
                'jumlah' => 5,
                'total' => 160000,
                'tanggal' => '2025-09-02'
            ],
            [
                'nama_barang' => 'Teh Jasmine',
                'kode_barang' => 'THJ210',
                'harga_satuan' => 18000,
                'jumlah' => 8,
                'total' => 144000,
                'tanggal' => '2025-11-04'
            ],
            [
                'nama_barang' => 'Keripik Singkong',
                'kode_barang' => 'KSB089',
                'harga_satuan' => 12000,
                'jumlah' => 10,
                'total' => 120000,
                'tanggal' => '2025-12-07'
            ],
            [
                'nama_barang' => 'Roti Coklat',
                'kode_barang' => 'RTC333',
                'harga_satuan' => 9000,
                'jumlah' => 12,
                'total' => 108000,
                'tanggal' => '2025-12-09'
            ],
        ];


        $dari = $this->request->getGet('dari_tanggal');
        $sampai = $this->request->getGet('sampai_tanggal');

        if ($dari && $sampai) {
            $transaksi = array_filter($transaksi, function ($row) use ($dari, $sampai) {
                return $row['tanggal'] >= $dari && $row['tanggal'] <= $sampai;
            });
        }

        return view('owner/riwayat_transaksi', [
            'transaksi' => $transaksi
        ]);
    }
}
