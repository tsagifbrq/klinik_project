<?php

namespace App\Controllers;

use App\Models\CheckupModel;
use App\Models\PatientsModel;
use CodeIgniter\I18n\Time;

class ListPasienToday extends BaseController
{
    protected $patient;
    protected $checkup;

    public function __construct()
    {
        $this->patient = new PatientsModel();
        $this->checkup = new CheckupModel();
    }
    public function index()
    {

        $allpatient = $this->patient->patienttoday(date('Y-m-d'));
        $data = [
            'content' => 'pages/list_pasien_today',
            'Judul' => 'List Pasien Hari ini',
            'patienttoday' => $allpatient->get()->getResultArray(),
        ];

        return view('tamplate/layout', $data);
    }

    public function deleteData($id)
    {
        $this->checkup->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di Hapus');
        // return redirect()->to("test-today");
    }
}
