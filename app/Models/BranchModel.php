<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table = 'branches';  // Replace with your actual table name if different
    protected $primaryKey = 'id';    // Replace with your primary key if different
    protected $allowedFields = ['name', 'code', 'phone', 'email', 'opening_date']; // Modify based on your database schema
    protected $useTimestamps = false;
}

