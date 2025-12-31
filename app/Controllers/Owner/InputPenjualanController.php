<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class InputPenjualanController extends BaseController
{
    public function index()
    {
        return view('owner/input_penjualan', [
            'title_page' => 'Input Penjualan'
        ]);
    }
}
