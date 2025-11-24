<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $groupModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->groupModel = new GroupModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');

        $query = $this->userModel
            ->select('users.*, auth_groups.name as group_name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');

        if ($search) {
            $query->groupStart()
                ->like('users.username', $search)
                ->orLike('users.email', $search)
                ->groupEnd();
        }

        $users = $query->findAll();

        return view('superAdmin/users/index', [
            'title_page' => 'Daftar User',
            'users' => $users,
            'search' => $search
        ]);
    }

    public function create()
    {
        $groups = $this->groupModel->findAll();
        
        return view('superAdmin/users/create', [
            'title_page' => 'Tambah User',
            'groups' => $groups
        ]);
    }

    public function store()
    {
        $rules = [
            'user_id' => 'required|is_unique[users.user_id]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username]',
            'password' => 'required|min_length[8]',
            'phone' => 'required|min_length[10]',
            'group_id' => 'required',
            'created_date' => 'required|valid_date[Y-m-d]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        $user = new \Myth\Auth\Entities\User($data);
        $user->activate();

        // Set custom created_at date if provided
        if (!empty($data['created_date'])) {
            $user->created_at = $data['created_date'] . ' 00:00:00';
        }

        if (!$this->userModel->save($user)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $userId = $this->userModel->getInsertID();
        $groupId = $this->request->getPost('group_id');

        $this->groupModel->addUserToGroup($userId, $groupId);

        return redirect()->to('superadmin/users')->with('message', 'User berhasil ditambahkan');
    }

    public function edit($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        $groups = $this->groupModel->findAll();
        $userGroup = $this->groupModel->getGroupsForUser($id);
        $groupId = !empty($userGroup) ? $userGroup[0]['group_id'] : null;

        return view('superAdmin/users/edit', [
            'title_page' => 'Edit User',
            'user' => $user,
            'groups' => $groups,
            'groupId' => $groupId
        ]);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User tidak ditemukan');
        }

        $rules = [
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'username' => 'required|alpha_numeric_space|min_length[3]|is_unique[users.username,id,' . $id . ']',
            'password' => 'permit_empty|min_length[8]',
            'group_id' => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $data = [
            'email' => $this->request->getPost('email'),
            'username' => $this->request->getPost('username'),
        ];

        if (!empty($this->request->getPost('password'))) {
            $data['password'] = $this->request->getPost('password');
        }

        if (!$this->userModel->update($id, $data)) {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }

        $groupId = $this->request->getPost('group_id');
        $this->groupModel->removeUserFromAllGroups($id);
        $this->groupModel->addUserToGroup($id, $groupId);

        return redirect()->to('superadmin/users')->with('message', 'User berhasil diperbarui');
    }

    public function delete($id)
    {
        if ($this->userModel->delete($id)) {
            return redirect()->to('superadmin/users')->with('message', 'User berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus user');
    }
}
