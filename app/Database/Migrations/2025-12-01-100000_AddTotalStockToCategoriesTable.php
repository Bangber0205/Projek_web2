<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddTotalStockToCategoriesTable extends Migration
{
    public function up()
    {
        // Add total_stock column to categories table
        $this->db->query("ALTER TABLE `categories` ADD COLUMN `total_stock` INT DEFAULT 0 AFTER `status`");
    }

    public function down()
    {
        // Remove total_stock column from categories table
        $this->db->query("ALTER TABLE `categories` DROP COLUMN `total_stock`");
    }
}
