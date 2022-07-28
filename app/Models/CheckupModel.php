<?php

namespace App\Models;

use CodeIgniter\Database\MySQLi\Builder;
use CodeIgniter\I18n\Time;

use CodeIgniter\Model;

class CheckupModel extends Model
{
    protected $table = 'covid_checkup';
    protected $allowedFields = ['nik', 'no_rm', 'upon_request', 'checkup', 'checkup_metode', 'ref_number', 'result', 'qr_code'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;



    public function cekCovid()
    {
        $this->today = (new Time('now', 'Asia/Jakarta', 'id_ID'))->format('dd-mm-yyyy');
        $builder = $this->db->table('covid_checkup as a')
            ->select('*');
        return $builder;
    }
    public function dailycek($date)
    {
        $sql = "select LEFT(created_at,10) as date,count(*) as jumlah from covid_checkup where LEFT(created_at,10) like '" . $date . "%' group by 1";
        $tes = $this->db->query($sql);

        return $tes;
    }

    public function getTahun()
    {

        $sql = $this->db->query("SELECT YEAR(created_at) as tahun from covid_checkup GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC");

        return $sql->getResult();
    }
    public function filterTanggal($tglawal, $tglakhir)
    {
        $sql = $this->db->query("SELECT covid_checkup.*,patients.name,patients.gender from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE covid_checkup.created_at BETWEEN '$tglawal' and DATE_ADD('$tglakhir', INTERVAL 1 DAY) ORDER BY covid_checkup.created_at ASC");
        // $tanggalFilter = $this->db->query($sql);

        return $sql->getResultArray();
    }

    public function filterBulan($bulanAwal, $bulanAkhir, $tahun1)
    {
        $sql = $this->db->query("SELECT covid_checkup.*, patients.name,patients.gender from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE covid_checkup.created_at BETWEEN '$bulanAwal' and DATE_ADD('$bulanAkhir', INTERVAL 1 DAY) AND  YEAR(covid_checkup.created_at)=$tahun1 ORDER BY covid_checkup.created_at ASC");
        // $tanggalFilter = $this->db->query($sql);

        return $sql->getResultArray();
    }
    public function filterTahun($tahun2)
    {
        $sql = "SELECT covid_checkup.*,patients.name,patients.gender from covid_checkup join patients on covid_checkup.nik = patients.nik WHERE YEAR(covid_checkup.created_at) = '$tahun2' order by covid_checkup.created_at ASC";
        $tahunFilter = $this->db->query($sql);

        return $tahunFilter->getResultArray();
    }
    public function ubahData($data, $id)
    {
        $this->db = db_connect();
        $this->builder = $this->db->table("covid_checkup as a");
        return $this->builder->update($data, ['a.id' => $id]);
    }

    public function cekLaporan($id)
    {
        $sql = $this->db->query("SELECT * FROM covid_checkup JOIN patients on covid_checkup.nik = patients.nik WHERE covid_checkup.id = $id");

        return $sql->getResultArray();
    }
}
