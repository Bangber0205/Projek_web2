<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        return view('owner/dashboard', [
            'title_page' => 'Dashboard Owner'
        ]);
    }
}
