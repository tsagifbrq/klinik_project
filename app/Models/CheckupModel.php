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

    public function __construct()
    {
        $this->db = db_connect();
        $this->builder = $this->db->table("covid_checkup as a");
    }

    public function cekCovid()
    {
        $this->today = new Time('now', 'Asia/Jakarta', 'id_ID');
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

        $sql = "SELECT YEAR(created_at) as tahun from covid_checkup GROUP BY YEAR(created_at) ORDER BY YEAR(created_at) ASC";
        $tahun = $this->db->query($sql);

        return $tahun;
    }

    public function ubahData($data, $id)
    {
        return $this->builder->update($data, ['a.id' => $id]);
    }
}
