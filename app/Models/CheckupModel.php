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
}
