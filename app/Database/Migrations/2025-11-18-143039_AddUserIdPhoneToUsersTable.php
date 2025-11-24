<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdPhoneToUsersTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('users', [
            'user_id' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'unique' => true,
                'after' => 'id'
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
                'after' => 'email'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('users', ['user_id', 'phone']);
    }
}
