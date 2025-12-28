<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $transaksi = session()->get('transaksi') ?? [];

        $totalTransaksi = count($transaksi);

        $transaksi = array_reverse($transaksi);

        $aktivitasTerbaru = array_slice($transaksi, 0, 3);

        $aktivitasTerbaru = array_map(function ($t) {
            return [
                'title'    => '#' . ($t['kode_barang'] ?? '-'),
                'subtitle' => ($t['jam'] ?? '00:00') 
                            . ' - ' . $t['nama_barang'] 
                            . ' x' . $t['jumlah'],
                'price'    => 'Rp ' . number_format($t['total'], 0, ',', '.'),
            ];
        }, $aktivitasTerbaru);

        return view('owner/dashboard', [
            'totalTransaksi'   => $totalTransaksi,
            'aktivitasTerbaru' => $aktivitasTerbaru,
        ]);
    }
}