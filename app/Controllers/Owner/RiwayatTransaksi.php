<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class RiwayatTransaksi extends BaseController
{
    public function index()
    {
        helper('rupiah');

        $transaksi = session()->get('transaksi') ?? [];

        $totalTransaksi = count($transaksi);

        $totalUang = 0;
        $totalHariIni = 0;
        $tanggalHariIni = date('Y-m-d');

        foreach ($transaksi as $t) {
            $totalUang += $t['total'];

            if ($t['tanggal'] === $tanggalHariIni) {
                $totalHariIni += $t['total'];
            }
        }

        $rataRata = $totalTransaksi > 0
            ? round($totalUang / $totalTransaksi)
            : 0;


        $dari = $this->request->getGet('dari_tanggal');
        $sampai = $this->request->getGet('sampai_tanggal');

        if ($dari && $sampai) {
            $transaksi = array_filter($transaksi, function ($row) use ($dari, $sampai) {
                return $row['tanggal'] >= $dari && $row['tanggal'] <= $sampai;
            });
        }
        
        $transaksi = array_reverse($transaksi);

        return view('owner/riwayat_transaksi', [
            'transaksi' => $transaksi,
            'totalTransaksi'    => $totalTransaksi,
            'totalHariIni'      => $totalHariIni,
            'rataRata'          => $rataRata,
        ]);
    }
}