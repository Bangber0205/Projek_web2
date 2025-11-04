<?php

namespace App\Controllers\SuperAdmin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('superAdmin/dashboard', [
            'title_page' => 'Dashboard',
        ]);
    }
}


?>