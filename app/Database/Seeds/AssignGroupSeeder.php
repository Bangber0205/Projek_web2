<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AssignGroupSeeder extends Seeder
{
    public function run()
    {
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
            echo "Error: Groups not found. Please run GroupSeeder first.\n";
            return;
        }

        echo "Found groups:\n";
        echo "- superadmin (ID: {$superadminGroup->id})\n";
        echo "- owner (ID: {$ownerGroup->id})\n\n";

        // Cek users yang ada (tidak termasuk yang deleted)
        $users = $this->db->table('users')
            ->where('deleted_at', null)
            ->orderBy('id', 'ASC')
            ->get()
            ->getResult();

        if (empty($users)) {
            echo "Warning: No active users found.\n";
            echo "Please create users first.\n";
            return;
        }

        echo "Found " . count($users) . " active user(s):\n";
        foreach ($users as $user) {
            echo "- ID: {$user->id}, Email: {$user->email}, Username: {$user->username}\n";
        }
        echo "\n";

        if (count($users) < 2) {
            echo "Warning: Need at least 2 users to assign both roles.\n";
            echo "Only assigning the first user as superadmin.\n\n";
            
            // Assign first user as superadmin
            $this->db->table('auth_groups_users')
                ->where('user_id', $users[0]->id)
                ->delete();
                
            $this->db->table('auth_groups_users')->insert([
                'group_id' => $superadminGroup->id,
                'user_id'  => $users[0]->id
            ]);
            
            echo "✓ Assigned user ID {$users[0]->id} ({$users[0]->username}) to group 'superadmin'\n";
            return;
        }

        // Assign first user as superadmin, second as owner
        $assignments = [
            ['user' => $users[0], 'group_id' => $superadminGroup->id, 'group_name' => 'superadmin'],
            ['user' => $users[1], 'group_id' => $ownerGroup->id, 'group_name' => 'owner']
        ];

        foreach ($assignments as $assignment) {
            $user = $assignment['user'];
            
            // Hapus assignment lama jika ada
            $this->db->table('auth_groups_users')
                ->where('user_id', $user->id)
                ->delete();

            // Insert assignment baru
            $this->db->table('auth_groups_users')->insert([
                'group_id' => $assignment['group_id'],
                'user_id'  => $user->id
            ]);

            echo "✓ Assigned user ID {$user->id} ({$user->username}) to group '{$assignment['group_name']}'\n";
        }

        echo "\nUser groups assigned successfully!\n";
    }
}
