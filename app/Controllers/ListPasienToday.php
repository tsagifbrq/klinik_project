<?php

namespace App\Controllers;

class ListPasienToday extends BaseController
{
    public function index()
    {
        $data = [
            'content' => 'pages/list_pasien_today',
            'Judul' => 'List Pasien Hari ini'
        ];

        return view('tamplate/layout', $data);
    }
}
