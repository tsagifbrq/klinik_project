<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class PatientsModel extends Model
{
    protected $table = 'patients';
    protected $primaryKey = 'nik';
    protected $allowedFields = ['nik', 'name', 'place_of_birth', 'birthday', 'gender', 'phone'];
    protected $useAutoIncrement = false;
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;

    protected $today;

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
}
