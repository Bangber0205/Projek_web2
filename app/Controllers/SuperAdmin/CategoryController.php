<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use CodeIgniter\HTTP\ResponseInterface;

class CategoryController extends BaseController
{
    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $categories = $this->categoryModel->getCategoriesWithItemCount();

        return view('superAdmin/categories/index', [
            'title_page' => 'Daftar Kategori Barang',
            'categories' => $categories
        ]);
    }

    public function create()
    {
        $errors = session('errors') ?? [];
        return view('superAdmin/categories/create', [
            'title_page' => 'Tambah Kategori Barang',
            'errors' => $errors
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'code' => 'required|min_length[2]|max_length[20]|is_unique[categories.code]',
            'description' => 'permit_empty|max_length[500]',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'code' => strtoupper($this->request->getPost('code')),
            'description' => $this->request->getPost('description'),
            'status' => $this->request->getPost('status'),
        ];

        if (!$this->categoryModel->save($data)) {
            return redirect()->back()->withInput()->with('errors', $this->categoryModel->errors());
        }

        return redirect()->to('superadmin/categories')->with('message', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('superAdmin/categories/edit', [
            'title_page' => 'Edit Kategori Barang',
            'category' => $category
        ]);
    }

    public function update($id)
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        $rules = [
            'name' => 'required|min_length[2]|max_length[100]',
            'code' => 'required|min_length[2]|max_length[20]|is_unique[categories.code,id,' . $id . ']',
            'status' => 'required|in_list[aktif,nonaktif]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'code' => strtoupper($this->request->getPost('code')),
            'status' => $this->request->getPost('status'),
        ];

        if (!$this->categoryModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->categoryModel->errors());
        }

        return redirect()->to('superadmin/categories')->with('message', 'Kategori berhasil diperbarui');
    }

    public function delete($id)
    {
        if ($this->categoryModel->delete($id)) {
            return redirect()->to('superadmin/categories')->with('message', 'Kategori berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus kategori');
    }

    public function detail($id)
    {
        $category = $this->categoryModel->find($id);
        if (!$category) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Kategori tidak ditemukan');
        }

        return view('superAdmin/categories/detail', [
            'title_page' => 'Detail Kategori Barang',
            'category' => $category
        ]);
    }
}
