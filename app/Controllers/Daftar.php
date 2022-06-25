<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\CheckupModel;
use CodeIgniter\I18n\Time;

class Daftar extends BaseController
{
    protected $patient;
    protected $checkup;
    protected $today;

    public function __construct()
    {
        $this->patient = new PatientsModel();
        $this->checkup = new CheckupModel();
        $this->today = new Time('now');
    }
    public function index()
    {
        return view('pages/daftar');
    }
    public function getdata()
    {
        if ($this->request->isAJAX()) {
            $table = $this->request->getVar('table');
            $id = $this->request->getVar('id');
            if ($table == 'patients') {
                $msg = $this->patient->find($id);
            } elseif ($table == 'covid_checkup') {
                $msg = $this->checkup->find($id);
            }

            return $this->response->setJSON($msg);
        } else {
            echo "Maaf Tidak di proses";
        }
    }
    public function saveData()
    {
        if ($this->request->isAJAX()) {
            $data = [
                'nik'  => $this->request->getVar('nik'),
                'name'  => $this->request->getVar('name'),
                'place_of_birth'  => $this->request->getVar('place_of_birth'),
                'birthday'  => $this->request->getVar('birthday'),
                'phone'  => $this->request->getVar('phone'),
                'gender'  => $this->request->getVar('gender'),

            ];
            $exam = $this->request->getVar('examination');
            if ($exam == '1') {
                $exam1 = 'Covid Antigen - Rapid';
                $exam2 = 'AntiGen Rapid Test';
            } elseif (($exam == '2')) {
                $exam1 = 'Covid Antibody - Rapid';
                $exam2 = 'Antibody Rapid Test';
            } else {
                $exam1 = 'Covid PCR - Swab';
                $exam2 = 'AntiGen PCR Swab';
            }
            $data2 = [
                'nik' => $this->request->getVar('nik'),
                'upon_request' => $this->request->getVar('upon_request'),
                'checkup' => $exam1,
                'checkup_metode' => $exam2,
            ];
            if ($this->patient->save($data) && $this->checkup->save($data2)) {
                return $this->response->setJSON(['success' => 'Anda Berhasil Mendaftar Harap Lapor admin']);
            } else {
                return $this->response->setJSON(['success' => 'Pasien Tidak Ditambahkan']);
            }
        } else {
            return $this->response->setJSON(['success' => 'Pasien Gagal Ditambahkan']);
        }
    }
}
