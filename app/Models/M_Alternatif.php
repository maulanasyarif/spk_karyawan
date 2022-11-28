<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Alternatif extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'alternatif';
    protected $primaryKey       = 'id_alternatif';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_alternatif', 'id_sekolah', 'status', 'total'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function sekolah()
    {
        return $this->db->table('sekolah AS S')
            ->join('alternatif AS A', 'S.id_sekolah = A.id_sekolah', 'LEFT')
            ->get()->getResultArray();
    }
}
