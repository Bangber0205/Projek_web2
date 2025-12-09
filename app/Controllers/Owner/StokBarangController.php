<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\StokBarangModel;


class StokBarangController extends BaseController
{
    public function index()
    {
        $model = new StokBarangModel();
        $data['stok'] = $model->findAll();

        return view('owner/stok_barang/index', $data);
    }

    public function create()
    {
        return view('owner/stok_barang/create');
    }

    public function store()
    {
        $model = new StokBarangModel();

        $model->save([
            'kode_barang'  => $this->request->getPost('kode_barang'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'kategori'     => $this->request->getPost('kategori'),
            'harga'        => $this->request->getPost('harga'),
            'jumlah_stok'  => $this->request->getPost('jumlah_stok'),
        ]);

        return redirect()->to('/owner/stok-barang')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $model = new StokBarangModel();
        $data['stok'] = $model->find($id);

        if (!$data['stok']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan kode $id tidak ditemukan");
        }

        return view('owner/stok_barang/edit', $data);
    }

    public function update($id)
    {
        $model = new StokBarangModel();

        $model->update($id, [
            'kode_barang'  => $this->request->getPost('kode_barang'),
            'nama_barang'  => $this->request->getPost('nama_barang'),
            'kategori'     => $this->request->getPost('kategori'),
            'harga'        => $this->request->getPost('harga'),
            'jumlah_stok'  => $this->request->getPost('jumlah_stok'),
        ]);

        return redirect()->to('/owner/stok-barang')->with('success', 'Data berhasil diperbarui!');
    }

    public function delete($id)
    {
        $model = new StokBarangModel();
        $model->delete($id);

        return redirect()->to('/owner/stok-barang')->with('success', 'Barang telah dihapus');
    }

}