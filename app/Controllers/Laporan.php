<?php

namespace App\Controllers;

use App\Models\PatientsModel;
use App\Models\CheckupModel;
use CodeIgniter\I18n\Time;
use Carbon\Carbon;
use Config\Format;
use DateTime;
use phpDocumentor\Reflection\PseudoTypes\False_;

class Laporan extends BaseController
{

    protected $patient;
    protected $checkup;
    protected $today;

    public function __construct()
    {
        helper('form');
        $this->patient = new PatientsModel();
        $this->checkup = new CheckupModel();
        $this->today = new Time('now');
    }
    public function index()
    {
        $data = [
            'content' => "pages/laporan",
            'Judul' => "Laporan",
            'tahun' => $this->checkup->getTahun()
        ];

        return view('tamplate/layout', $data);
    }

    public function print_laporan_tanggal()
    {
        $tglAwal = $this->request->getPost('tglawal');
        $tglAkhir = $this->request->getPost('tglakhir');

        $filterTanggal = $this->checkup->filterTanggal($tglAwal, $tglAkhir);
        $data = [
            'dataLaporan' => $filterTanggal,
            'tglAwal' => $tglAwal,
            'tglAkhir' => $tglAkhir,
        ];
        return view('pages/print_laporan_tanggal', $data);
    }

    public function print_laporan_bulan()
    {
        $bulanAwal = $this->request->getPost('bulanawal');
        $bulanAkhir = $this->request->getPost('bulanakhir');
        $tahun1 = $this->request->getPost('tahun1');
        $first_date = new Time($tahun1 . '-' . $bulanAwal . '-01');
        $time = new Time($tahun1 . '-' . $bulanAkhir . '-01');
        $last_date = $time->format('Y-m-t');

        $filterBulan = $this->checkup->filterBulan($first_date, $last_date, $tahun1);

        $data = [
            'filterBulan' => $filterBulan,
            'bulanAwal' => $bulanAwal,
            'bulanAkhir' => $bulanAkhir,
            'tahun' => $tahun1,
            'last_date' => $last_date,
            'first_date' => $first_date,
        ];

        return view('pages/print_laporan_bulan', $data);
    }
    public function print_laporan_tahun()
    {
        $tahun = $this->request->getPost('tahun2');
        $filterTahun = $this->checkup->filterTahun($tahun);
        $data = [
            'filterTahun' => $filterTahun,
            'tahun' => $tahun,
        ];
        return view('pages/print_laporan_tahun', $data);
    }


    // function filter()
    // {
    //     $tanggalAwal = $this->input->POST('tanggalawal');
    //     $tanggalAkhir = $this->input->POST('tanggalakhir');
    //     $tahun1 = $this->input->POST('tahun1');
    //     $bulanAwal = $this->input->POST('bulanawal');
    //     $bulanAkhir = $this->input->POST('bulanakhir');
    //     $tahun2 = $this->input->POST('tahun2');
    //     $nilaiFilter = $this->input->POST('nilaifilter');

    //     if ($nilaiFilter = 1) {
    //         $data = [
    //             'title' => "Laporan Penjualan By Tanggal",
    //             'subtitle' => "Dari Tanggal : " . $tanggalAwal . 'Sampai Tanggal : ' . $tanggalAkhir,
    //             'dataFilter' => $this->checkup->filterTanggal($tanggalAwal, $tanggalAkhir),
    //         ];
    //         $this->load->view('pages/print_laporan', $data);
    //     } elseif ($nilaiFilter = 2) {
    //         $data = [
    //             'title' => "Laporan Penjualan By Tanggal",
    //             'subtitle' => "Dari Bulan : " . $bulanAwal . 'Sampai Bulan : ' . $bulanAkhir . 'Tahun : ' . $tahun1,
    //             'dataFilter' => $this->checkup->filterBulan($tahun1, $bulanAwal, $bulanAkhir)
    //         ];
    //         $this->load->view('pages/print_laporan', $data);
    //     } elseif ($nilaiFilter = 3) {
    //         $data = [
    //             'title' => "Laporan Penjualan By Tahun",
    //             'subtitle' => 'Tahun : ' . $tahun2,
    //             'dataFilter' => $this->checkup->filterTahun($tahun2),
    //         ];
    //         $this->load->view('pages/print_laporan', $data);
    //     }
    // }
}
