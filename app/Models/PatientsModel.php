<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;
use PDO;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['nik', 'name', 'place_of_birth', 'birthday', 'gender', 'phone'];
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $today;

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table($this->table);
    }

    public function patienttoday($date)
    {
        $this->today = new Time('now', 'Asia/Jakarta', 'id_ID');
        $builder = $this->db->table('covid_checkup as a')
            ->select('*,a.created_at,a.deleted_at')
            ->join('patients as b', 'a.nik=b.nik')
            ->like('a.created_at', $date)
            ->where('a.deleted_at', null);
        return $builder;
    }
    public function allpatient()
    {
        $this->today = new Time('now', 'Asia/Jakarta', 'id_ID');
        $builder = $this->db->table('patients as a')
            ->select('*');
        return $builder;
    }
    public function alldatapatient()
    {
        $this->today = new Time('now', 'Asia/Jakarta', 'id_ID');
        $builder = $this->db->table('patient as a')
            ->select('*');
        return $builder;
    }

    public function getTahun()
    {

        $sql = $this->db->query("SELECT YEAR(created_at) as tahun from covid_checkup GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");

        return $sql->getResult();
    }


    public function filterTanggal($tglawal, $tglakhir)
    {
        $sql = $this->db->query("SELECT * from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE covid_checkup.created_at BETWEEN '$tglawal' and DATE_ADD('$tglakhir', INTERVAL 1 DAY) ORDER BY covid_checkup.created_at ASC");
        // $tanggalFilter = $this->db->query($sql);

        return $sql->getResultArray();
    }

    public function filterBulan($bulanAwal, $bulanAkhir, $tahun1)
    {
        $sql = $this->db->query("SELECT * from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE covid_checkup.created_at BETWEEN '$bulanAwal' and DATE_ADD('$bulanAkhir', INTERVAL 1 DAY) AND  YEAR(covid_checkup.created_at)=$tahun1 ORDER BY covid_checkup.created_at ASC");
        // $tanggalFilter = $this->db->query($sql);

        return $sql->getResultArray();
    }
    public function filterTahun($tahun2)
    {
        $sql = "SELECT * from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE YEAR(covid_checkup.created_at) = '$tahun2' order by covid_checkup.created_at ASC";
        $tahunFilter = $this->db->query($sql);

        return $tahunFilter->getResultArray();
    }

    public function cekLaporan($id)
    {
        return $this->qr
            ->join('covid_checkup as b', 'a.nik=b.nik')
            ->where(['a.id' => $id])->first();
    }
}
