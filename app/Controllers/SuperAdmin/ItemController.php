<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\ItemModel;
use App\Models\CategoryModel;
use App\Models\NotificationModel;

class ItemController extends BaseController
{
    protected $itemModel;
    protected $notificationModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
        $this->notificationModel = new NotificationModel();
    }

    public function index()
    {
        $data['items'] = $this->itemModel->findAll();
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('superAdmin/items/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();
        return view('superAdmin/items/create', $data);
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
        session()->setFlashdata('success', 'Barang berhasil ditambahkan.');

        // Log notification
        $this->notificationModel->createNotification([
            'title' => 'Barang Baru Ditambahkan',
            'message' => "Barang '{$data['nama_barang']}' telah berhasil ditambahkan ke sistem.",
            'type' => 'success'
        ]);

        return redirect()->to('superadmin/items');
    }

    public function edit($id)
    {
        $data['item'] = $this->itemModel->find($id);

        if (!$data['item']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Item with ID $id not found");
        }

        $categoryModel = new CategoryModel();
        $data['categories'] = $categoryModel->findAll();

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

        // Log notification
        $this->notificationModel->createNotification([
            'title' => 'Barang Diperbarui',
            'message' => "Barang '{$data['nama_barang']}' telah berhasil diperbarui.",
            'type' => 'info'
        ]);

        return redirect()->to('superadmin/items');
    }

    public function delete($id)
    {
        $item = $this->itemModel->find($id);
        $this->itemModel->delete($id);

        // Log notification
        $this->notificationModel->createNotification([
            'title' => 'Barang Dihapus',
            'message' => "Barang '{$item['nama_barang']}' telah berhasil dihapus.",
            'type' => 'warning'
        ]);

        return redirect()->to('superadmin/items');
    }
}
