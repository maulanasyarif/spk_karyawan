<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Kriteria extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kriteria';
    protected $primaryKey       = 'id_kriteria';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kriteria', 'nama_kriteria', 'bobot_kriteria'];

    public function Subkriteria($id)
    {
        return $this->db()->table('kriteria AS K')
            ->join('subkriteria AS S', 'K.id_kriteria = S.id_kriteria', 'LEFT')
            ->where('S.id_kriteria', $id)
            ->get()->getResultArray();
    }

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
}
