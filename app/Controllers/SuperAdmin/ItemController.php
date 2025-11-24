<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ItemModel;

class ItemController extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    public function index()
    {
        $data['items'] = $this->itemModel->findAll();
        return view('superAdmin/items/index', $data);
    }

    public function create()
    {
        return view('superAdmin/items/create');
    }

    public function store()
    {
        $data = [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        if (!$this->validate($this->itemModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->itemModel->save($data);

        // Add flash message for success
        session()->setFlashdata('success', 'Barang berhasil ditambahkan.');

        return redirect()->to('superadmin/items');
    }

    public function edit($id)
    {
        $data['item'] = $this->itemModel->find($id);

        if (!$data['item']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Item with ID $id not found");
        }

        return view('superAdmin/items/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'id' => $id,
            'nama_barang' => $this->request->getPost('nama_barang'),
            'kode_barang' => $this->request->getPost('kode_barang'),
            'kategori' => $this->request->getPost('kategori'),
            'harga' => $this->request->getPost('harga'),
            'jumlah' => $this->request->getPost('jumlah'),
        ];

        if (!$this->validate($this->itemModel->getValidationRules())) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->itemModel->save($data);

        return redirect()->to('superadmin/items');
    }

    public function delete($id)
    {
        $this->itemModel->delete($id);
        return redirect()->to('superadmin/items');
    }
}
