<?php

namespace App\Controllers;

use App\Models\FeedbackModel;

class Pages extends BaseController
{
    public function index()
    {
        $feedbackModel = new FeedbackModel();
        $feedbacks = $feedbackModel->orderBy('id', 'DESC')->findAll();
        return view('pages/home', ['feedbacks' => $feedbacks]);
    }

    public function save()
    {
        if ($this->request->getMethod() !== 'post') {
            return redirect()->to('/');
        }

        $rules = [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|valid_email',
            'subject'    => 'required',
            'message'    => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $data = $this->request->getPost(['first_name', 'last_name', 'email', 'subject', 'message']);
        $feedbackModel = new FeedbackModel();
        $feedbackModel->insert($data);

        return redirect()->to('/');
    }
}