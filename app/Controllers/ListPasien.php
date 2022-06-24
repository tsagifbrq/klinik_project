<?php

namespace App\Controllers;

class ListPasien extends BaseController
{
    public function index()
    {
        $data = [
            'content' => 'pages/list_pasien',
            'Judul' => 'List Semua Pasien'
        ];

        return view('tamplate/layout', $data);
    }
}
