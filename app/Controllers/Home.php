<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'content' => 'pages/dashboard',
            'Judul' => 'Dashboard'
        ];

        return view('tamplate/layout', $data);
    }
}
