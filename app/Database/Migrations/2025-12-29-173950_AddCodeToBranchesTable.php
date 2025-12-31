<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCodeToBranchesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('branches', [
            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('branches', 'code');
    }
}
