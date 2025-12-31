<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name'        => 'superadmin',
                'description' => 'Super Administrator with full access'
            ],
            [
                'name'        => 'owner',
                'description' => 'Owner with access to branch management'
            ]
        ];

        // Insert data ke tabel auth_groups
        $this->db->table('auth_groups')->insertBatch($data);
        
        echo "Groups created successfully!\n";
    }
}
