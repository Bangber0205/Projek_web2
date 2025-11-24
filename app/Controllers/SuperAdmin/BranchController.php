<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;

class BranchController extends BaseController
{
    protected $db;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $branches = $this->db->table('branches')->get()->getResultArray();

        $totalBranches = count($branches);
        $activeBranches = count(array_filter($branches, fn($b) => $b['status'] === 'aktif'));
        $inactiveBranches = $totalBranches - $activeBranches;

        return view('superAdmin/branches/index', [
            'title_page' => 'Daftar Cabang',
            'branches' => $branches,
            'totalBranches' => $totalBranches,
            'activeBranches' => $activeBranches,
            'inactiveBranches' => $inactiveBranches
        ]);
    }

    public function create()
    {
        return view('superAdmin/branches/create', [
            'title_page' => 'Tambah Cabang'
        ]);
    }

    public function store()
    {
        $rules = [
            'name' => 'required|min_length[3]',
            'location' => 'required|min_length[3]',
            'contact' => 'required|min_length[10]',
            'email' => 'required|valid_email',
            'opening_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[aktif,non-aktif]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'contact' => $this->request->getPost('contact'),
            'email' => $this->request->getPost('email'),
            'opening_date' => $this->request->getPost('opening_date'),
            'status' => $this->request->getPost('status')
        ];

        $this->db->table('branches')->insert($data);

        return redirect()->to('superadmin/branches')->with('message', 'Cabang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $branch = $this->db->table('branches')->where('id', $id)->get()->getRowArray();

        if (!$branch) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cabang tidak ditemukan');
        }

        return view('superAdmin/branches/edit', [
            'title_page' => 'Edit Cabang',
            'branch' => $branch
        ]);
    }

    public function update($id)
    {
        $branch = $this->db->table('branches')->where('id', $id)->get()->getRowArray();

        if (!$branch) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Cabang tidak ditemukan');
        }

        $rules = [
            'name' => 'required|min_length[3]',
            'location' => 'required|min_length[3]',
            'contact' => 'required|min_length[10]',
            'email' => 'required|valid_email',
            'opening_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[aktif,non-aktif]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'location' => $this->request->getPost('location'),
            'contact' => $this->request->getPost('contact'),
            'email' => $this->request->getPost('email'),
            'opening_date' => $this->request->getPost('opening_date'),
            'status' => $this->request->getPost('status')
        ];

        $this->db->table('branches')->where('id', $id)->update($data);

        return redirect()->to('superadmin/branches')->with('message', 'Cabang berhasil diperbarui');
    }

    public function delete($id)
    {
        $branch = $this->db->table('branches')->where('id', $id)->get()->getRowArray();

        if (!$branch) {
            return redirect()->back()->with('error', 'Cabang tidak ditemukan');
        }

        $this->db->table('branches')->where('id', $id)->delete();

        return redirect()->to('superadmin/branches')->with('message', 'Cabang berhasil dihapus');
    }
}
