<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table            = 'feedbacks';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['first_name', 'last_name', 'email', 'subject', 'message'];
    protected $useTimestamps    = false;
}
