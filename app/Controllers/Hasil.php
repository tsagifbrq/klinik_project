<?php

namespace App\Controllers;

use App\Models\CheckupModel;
use App\Models\PatientsModel;

class Hasil extends BaseController
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
        return view('pages/hasil');
    }

    public function cek_laporan($id)
    {
        $detail =  $this->checkup->cekLaporan($id);
        $dataLaporan = [
            'cid' => $detail,
        ];

        return view('pages/hasil', $dataLaporan);
    }
}
