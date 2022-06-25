<?php

namespace App\Controllers;

use App\Models\PatientsModel;

class ListPasien extends BaseController
{
    protected $patient;
    public function __construct()
    {
        $this->patient = new PatientsModel();
    }
    public function index()
    {
        $allpatient = $this->patient->allpatient();
        $data = [
            'content' => 'pages/list_pasien',
            'Judul' => 'List Semua Pasien',
            'listpasien' => $allpatient->get()->getResultArray(),
        ];

        return view('tamplate/layout', $data);
    }
}
