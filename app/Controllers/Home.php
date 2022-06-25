<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\CheckupModel;
use CodeIgniter\I18n\Time;

class Home extends BaseController
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
        $allpatient = $this->patient->allpatient();
        $allcheckup = $this->checkup->cekCovid();
        $cekdaily = $this->checkup->dailycek(date('Y-m'));
        $i = 0;
        foreach ($cekdaily->getResultArray() as $row) {
            $nilai[$i] = $row['jumlah'];
            $i = $i + 1;
        }
        $data = [
            'content' => 'pages/dashboard',
            'Judul' => 'Dashboard',
            'totalpatient' => $allpatient->countAllResults(true),
            'negatifcovid' => $allcheckup->where('result', 'Negatif')->countAllResults(true),
            'positifcovid' => $allcheckup->where('result', 'Positif')->countAllResults(true),
            'pasientoday' => $allcheckup->like('created_at', '2022-06-23')->countAllResults(true),
            'dailypasien' => $nilai,
        ];
        return view('tamplate/layout', $data);
    }
}
