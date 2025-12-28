<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class InputPenjualanController extends BaseController
{
    public function index()
    {
        $stok = [
            ["kode" => "SBK-1", "nama" => "Beras 5 Kg",        "kategori" => "Sembako",        "harga" => 68000, "stok" => 15],
            ["kode" => "SBK-2", "nama" => "Telur Ayam",        "kategori" => "Sembako",        "harga" => 28000, "stok" => 30],
            ["kode" => "SBK-3", "nama" => "Minyak Goreng 1 L", "kategori" => "Sembako",        "harga" => 17000, "stok" => 20],
            ["kode" => "SBK-4", "nama" => "Gula Pasir 1 Kg",   "kategori" => "Sembako",        "harga" => 14000, "stok" => 25],
            ["kode" => "SBK-5", "nama" => "Mie Instan",        "kategori" => "Sembako",        "harga" => 3500,  "stok" => 50],

            ["kode" => "FRZ-1", "nama" => "Nugget Ayam",       "kategori" => "Frozen Food",    "harga" => 32000, "stok" => 12],
            ["kode" => "FRZ-2", "nama" => "Sosis Sapi",        "kategori" => "Frozen Food",    "harga" => 26000, "stok" => 18],
            ["kode" => "FRZ-3", "nama" => "Kentang Goreng",   "kategori" => "Frozen Food",    "harga" => 24000, "stok" => 14],

            ["kode" => "SN-1",  "nama" => "Taro Net",          "kategori" => "Snack",          "harga" => 9000,  "stok" => 40],

            ["kode" => "MN-1",  "nama" => "Fanta 390 ml",      "kategori" => "Minuman",        "harga" => 6000,  "stok" => 35],

            ["kode" => "PR-1",  "nama" => "Sabun Cair",        "kategori" => "Perleng. Rumah", "harga" => 18000, "stok" => 22],
            ["kode" => "PR-2",  "nama" => "Shampoo",           "kategori" => "Perleng. Rumah", "harga" => 24000, "stok" => 16],
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

    public function addToCart()
    {
        $cart = session()->get('cart') ?? [];

        $kode  = $this->request->getPost('kode');
        $nama  = $this->request->getPost('nama');
        $harga = $this->request->getPost('harga');
        $qty   = (int) $this->request->getPost('qty');

        if (isset($cart[$kode])) {
            $cart[$kode]['qty'] += $qty;
            $cart[$kode]['subtotal'] = $cart[$kode]['qty'] * $harga;
        } else {
            $cart[$kode] = [
                'kode' => $kode,
                'nama' => $nama,
                'harga' => $harga,
                'qty' => $qty,
                'subtotal' => $harga * $qty
            ];
        }

        session()->set('cart', $cart);
        return redirect()->back();
    }

    public function removeFromCart()
    {
        $kode = $this->request->getPost('kode');
        $cart = session()->get('cart') ?? [];

        if (isset($cart[$kode])) {
            unset($cart[$kode]);
            session()->set('cart', $cart);
            
            // Jika keranjang kosong, hapus session cart
            if (empty($cart)) {
                session()->remove('cart');
            }
        }

        return redirect()->back();
    }

    public function clearCart()
    {
        session()->remove('cart');
        return redirect()->back();
    }

    public function save()
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return redirect()->back();
        }

        $transaksi = session()->get('transaksi') ?? [];

        foreach ($cart as $item) {
            $transaksi[] = [
                'nama_barang'  => $item['nama'],
                'kode_barang'  => $item['kode'],
                'harga_satuan' => $item['harga'],
                'jumlah'       => $item['qty'],
                'total'        => $item['subtotal'],
                'tanggal'      => date('Y-m-d'),
                'jam'          => date('H:i'),

            ];
        }

        session()->set('transaksi', $transaksi);
        session()->remove('cart');

        return redirect()->to('/owner/riwayat-transaksi');
    }

}