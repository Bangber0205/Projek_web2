<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use Myth\Auth\Models\UserModel;
use Myth\Auth\Authorization\GroupModel;

class UserController extends BaseController
{
    protected $userModel;
    protected $groupModel;
    protected $notificationModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->groupModel = new GroupModel();
        $this->notificationModel = new NotificationModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        $role = $this->request->getGet('role');

        $query = $this->userModel
            ->select('users.*, auth_groups.name as group_name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id', 'left')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id', 'left');

        if ($search) {
            $query->groupStart()
                ->like('users.username', $search)
                ->orLike('users.email', $search)
                ->orLike('auth_groups.name', $search)
                ->orLike('users.id', $search)
                ->orLike('users.created_at', $search)
                ->orLike("CONCAT('UR', LPAD(users.id, 3, '0'))", $search)
                ->orLike("DATE_FORMAT(users.created_at, '%d-%m-%Y')", $search)
                ->groupEnd();
        }

        if ($role) {
            $query->where('auth_groups.name', $role);
        }

        $users = $query->groupBy('users.id')->findAll();
        $groups = $this->groupModel->findAll();

        return view('superAdmin/users/index', [
            'title_page' => 'Daftar User',
            'users' => $users,
            'search' => $search,
            'role' => $role,
            'groups' => $groups
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

        // Log notification
        $this->notificationModel->createNotification([
            'title' => 'User Baru Ditambahkan',
            'message' => "User '{$data['username']}' telah berhasil ditambahkan ke sistem.",
            'type' => 'success'
        ]);

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

        // Log notification
        $this->notificationModel->createNotification([
            'title' => 'User Diperbarui',
            'message' => "User '{$data['username']}' telah berhasil diperbarui.",
            'type' => 'info'
        ]);

        return redirect()->to('superadmin/users')->with('message', 'User berhasil diperbarui');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if ($this->userModel->delete($id)) {
            // Log notification
            $this->notificationModel->createNotification([
                'title' => 'User Dihapus',
                'message' => "User '{$user['username']}' telah berhasil dihapus.",
                'type' => 'warning'
            ]);

            return redirect()->to('superadmin/users')->with('message', 'User berhasil dihapus');
        }

        return redirect()->back()->with('error', 'Gagal menghapus user');
    }
}
