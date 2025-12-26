<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class Pages extends BaseController
{
    public function index()
    {
        return view('pages/home');
    }
}