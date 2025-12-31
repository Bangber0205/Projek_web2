<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Pastikan groups sudah ada (jalankan GroupSeeder dulu jika belum)
        $this->call('GroupSeeder');
        
        echo "\n=== Creating Users ===\n\n";
        
        // Ambil group IDs
        $superadminGroup = $this->db->table('auth_groups')
            ->where('name', 'superadmin')
            ->get()
            ->getRow();
            
        $ownerGroup = $this->db->table('auth_groups')
            ->where('name', 'owner')
            ->get()
            ->getRow();

        if (!$superadminGroup || !$ownerGroup) {
            echo "Error: Groups not found. GroupSeeder should have been called.\n";
            return;
        }

        // Data users yang akan dibuat
        $users = [
            [
                'email'         => 'superadmin@warungkita.com',
                'username'      => 'superadmin',
                'password'      => 'sukaadmin543',
                'group_id'      => $superadminGroup->id,
                'group_name'    => 'superadmin'
            ],
            [
                'email'         => 'owner@warungkita.com',
                'username'      => 'owner',
                'password'      => 'sukaowner543',
                'group_id'      => $ownerGroup->id,
                'group_name'    => 'owner'
            ]
        ];

        foreach ($users as $userData) {
            // Cek apakah user sudah ada
            $existingUser = $this->db->table('users')
                ->where('email', $userData['email'])
                ->get()
                ->getRow();

            if ($existingUser) {
                echo "⚠ User {$userData['email']} already exists (ID: {$existingUser->id})\n";
                
                // Update group assignment jika belum ada
                $existingAssignment = $this->db->table('auth_groups_users')
                    ->where('user_id', $existingUser->id)
                    ->get()
                    ->getRow();
                    
                if (!$existingAssignment) {
                    $this->db->table('auth_groups_users')->insert([
                        'group_id' => $userData['group_id'],
                        'user_id'  => $existingUser->id
                    ]);
                    echo "  ✓ Assigned to group '{$userData['group_name']}'\n";
                } else {
                    echo "  → Already assigned to a group\n";
                }
                continue;
            }

            // Buat user baru - gunakan EXACT SAME METHOD dengan Myth:Auth
            // Myth:Auth melakukan: base64_encode(hash('sha384', $password, true)) sebelum bcrypt
            $preparedPassword = base64_encode(hash('sha384', $userData['password'], true));
            $hashedPassword = password_hash($preparedPassword, PASSWORD_DEFAULT);
            
            $this->db->table('users')->insert([
                'email'         => $userData['email'],
                'username'      => $userData['username'],
                'password_hash' => $hashedPassword,
                'active'        => 1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
            ]);

            $userId = $this->db->insertID();

            if (!$userId) {
                echo "✗ Failed to create user {$userData['email']}\n";
                continue;
            }

            // Assign ke group
            $this->db->table('auth_groups_users')->insert([
                'group_id' => $userData['group_id'],
                'user_id'  => $userId
            ]);

            echo "✓ Created user: {$userData['username']} ({$userData['email']})\n";
            echo "  → Password: {$userData['password']}\n";
            echo "  → Assigned to group: {$userData['group_name']}\n\n";
        }

        echo "Users created successfully!\n\n";
        echo "Login credentials:\n";
        echo "─────────────────────────────────────────\n";
        echo "SuperAdmin:\n";
        echo "  Email: superadmin@warungkita.com\n";
        echo "  Password: sukaadmin543\n\n";
        echo "Owner:\n";
        echo "  Email: owner@warungkita.com\n";
        echo "  Password: sukaowner543\n";
        echo "─────────────────────────────────────────\n";
    }
}
