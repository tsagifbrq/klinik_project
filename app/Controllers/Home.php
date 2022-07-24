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
        $now = (new Time('now', 'Asia/Jakarta', 'id_ID'));
        $tahun = $this->request->getGet('tahun') ?? $now->format('Y');
        $bulan = $this->request->getGet('bulan') ?? $now->format('m');
        $date = $tahun . '-' . $bulan;

        $cekdaily = $this->checkup->dailycek($date);
        // dd($tahun . '-' . $bulan);
        $i = 0;
        foreach ($cekdaily->getResultArray() as $row) {
            $nilai[$i] = $row['jumlah'];
            $i = $i + 1;
        }
        $data = [
            'content' => 'pages/dashboard',
            'Judul' => 'Dashboard',
            'tahun' => $tahun,
            'bulan' => $bulan,
            'totalpatient' => $allpatient->countAllResults(true),
            'negatifcovid' => $allcheckup->where('result', 'Negatif')->countAllResults(true),
            'positifcovid' => $allcheckup->where('result', 'Positif')->countAllResults(true),
            'pasientoday' => $allcheckup->like('created_at', date('Y-m-d'))->countAllResults(true),
            'tesantigen' => $allcheckup->where('checkup', 'Covid Antigen - Rapid')->countAllResults(true),
            'tesantibody' => $allcheckup->where('checkup', 'Covid Antibody - Rapid')->countAllResults(true),
            'tespcr' => $allcheckup->where('checkup', 'Covid PCR-Swab')->countAllResults(true),
            'dailypasien' => $nilai ?? [],
        ];
        return view('tamplate/layout', $data);
    }
}
