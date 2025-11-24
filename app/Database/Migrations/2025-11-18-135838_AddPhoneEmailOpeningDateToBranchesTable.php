<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPhoneEmailOpeningDateToBranchesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('branches', [
            'contact' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => true,
            ],
            'opening_date' => [
                'type' => 'DATE',
                'null' => true,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('branches', ['phone', 'email', 'opening_date']);
    }
}
