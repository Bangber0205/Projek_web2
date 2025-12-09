<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $aktivitasTerbaru = [
            [
                'title'    => '#KFM102',
                'subtitle' => '14:25 - Kopi Arabica x2',
                'price'    => 'Rp 64.000',
            ],
            [
                'title'    => '#THJ210',
                'subtitle' => '14:32 - Teh Jasmine x1',
                'price'    => 'Rp 18.000',
            ],
            [
                'title'    => '#KSB089',
                'subtitle' => '15:12 - Keripik Singkong x1',
                'price'    => 'Rp 12.000',
            ],
        ];

        return view('owner/dashboard', [
            'aktivitasTerbaru' => $aktivitasTerbaru
        ]);
    }
}