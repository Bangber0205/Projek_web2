<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class InputPenjualanController extends BaseController
{
    public function index()
    {
        // data masih dummy
        $stok = [
            ["kode" => "SBK-1", "nama" => "Beras",           "kategori" => "Sembako", "harga" => 6000, "stok" => 10],
            ["kode" => "SBK-2", "nama" => "Telur",          "kategori" => "Sembako", "harga" => 6000, "stok" => 10],
            ["kode" => "SBK-3", "nama" => "Minyak Goreng",  "kategori" => "Sembako", "harga" => 6000, "stok" => 10],
            ["kode" => "SBK-4", "nama" => "Gula Pasir",     "kategori" => "Sembako", "harga" => 6000, "stok" => 10],
            ["kode" => "SBK-5", "nama" => "Mie Instan",     "kategori" => "Sembako", "harga" => 6000, "stok" => 10],
            ["kode" => "FRZ-1", "nama" => "Nugget",         "kategori" => "Frozen Food", "harga" => 6000, "stok" => 10],
            ["kode" => "FRZ-2", "nama" => "Sosis",          "kategori" => "Frozen Food", "harga" => 6000, "stok" => 10],
            ["kode" => "FRZ-3", "nama" => "Kentang Goreng", "kategori" => "Frozen Food", "harga" => 6000, "stok" => 10],
            ["kode" => "SN-1",  "nama" => "Taro",           "kategori" => "Snack",   "harga" => 6000, "stok" => 10],
            ["kode" => "MN-1",  "nama" => "Fanta",          "kategori" => "Minuman", "harga" => 6000, "stok" => 10],
            ["kode" => "PR-1",  "nama" => "Sabun Cair",     "kategori" => "Perleng. Rumah", "harga" => 6000, "stok" => 10],
            ["kode" => "PR-2",  "nama" => "Shampoo",        "kategori" => "Perleng. Rumah", "harga" => 6000, "stok" => 10],
        ];

        $keyword = $this->request->getGet('search');

        if ($keyword) {
            $keywordLower = strtolower($keyword);
            $stok = array_filter($stok, function ($item) use ($keywordLower) {
                return strpos(strtolower($item['nama']), $keywordLower) !== false;
            });
        }

        return view('owner/input_penjualan', [
            'stok' => $stok,
            'keyword' => $keyword
        ]);
    }
}
