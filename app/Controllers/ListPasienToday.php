<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use CodeIgniter\I18n\Time;

class ListPasienToday extends BaseController
{
    protected $patient;

    public function __construct()
    {
        $this->patient = new PatientsModel();
    }
    public function index()
    {

        $allpatient = $this->patient->patienttoday('2022-06-25');
        $data = [
            'content' => 'pages/list_pasien_today',
            'Judul' => 'List Pasien Hari ini',
            'patienttoday' => $allpatient->get()->getResultArray(),
        ];

        return view('tamplate/layout', $data);
    }
}
