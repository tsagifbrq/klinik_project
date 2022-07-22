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

    public function delete($id)
    {
        $this->checkup->delete($id);
        session()->setFlashdata('message', 'Data berhasil di Hapus');
        return redirect()->to("pasient-today");
    }

    public function ubah()
    {
        $time = new Time('now', 'Asia/Jakarta', 'id_ID');
        $id = $this->request->getPost('id');
        $data = [
            'result' => $this->request->getPost('result'),
            'ref_number' => $this->request->getPost('ref_number'),
            'no_rm' => $this->request->getPost('no_rm'),
            'updated_at' => $time,
        ];

        //update data
        $this->checkup->ubahData($data, $id);
        session()->setFlashdata('msg', 'Data berhasil di update');
        return redirect()->to('pasient-today');
    }
}
