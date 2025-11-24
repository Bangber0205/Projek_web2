<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddImageToBranchesTable extends Migration
{
    public function up()
    {
        $this->forge->addColumn('branches', [
            'image VARCHAR(255) NULL AFTER status'
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('branches', 'image');
    }
}
