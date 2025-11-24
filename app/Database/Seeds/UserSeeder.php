<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'email'    => 'admin@warungkita.com',
            'username' => 'admin',
            'password_hash' => password_hash('admin123', PASSWORD_DEFAULT),
            'active'   => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->table('users')->insert($data);
        
        // Insert ke group superadmin
        $userId = $this->db->insertID();
        
        // Buat group superadmin jika belum ada
        $group = $this->db->table('auth_groups')->where('name', 'superadmin')->get()->getRow();
        
        if (!$group) {
            $this->db->table('auth_groups')->insert([
                'name' => 'superadmin',
                'description' => 'Super Administrator'
            ]);
            $groupId = $this->db->insertID();
        } else {
            $groupId = $group->id;
        }
        
        // Assign user ke group
        $this->db->table('auth_groups_users')->insert([
            'group_id' => $groupId,
            'user_id' => $userId
        ]);
    }
}
