<?php

namespace App\Models;

use CodeIgniter\Model;

class BranchModel extends Model
{
    protected $table = 'branches';  
    protected $primaryKey = 'id';    
    protected $allowedFields = ['name', 'code', 'phone', 'email', 'opening_date']; 
    protected $useTimestamps = false;
}

