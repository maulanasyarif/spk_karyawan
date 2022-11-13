<?php

namespace App\Models;

use CodeIgniter\Model;


class M_Subkriteria extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'subkriteria';
    protected $primaryKey       = 'id_subkriteria';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'id_subkriteria', 'nama_subkriteria', 'kriteria_id', 'bobot_subkriteria',
        // 'tipe', 'nilai_minimum', 'nilai_maksimum', 'op_min', 'op_max', 'id_nilai'
    ];

    // function index()
    // {
    // $query = " SELECT
    //             subkriteria.id_subkriteria,
    //             subkriteria.nama_subkriteria,
    //             subkriteria.id_kriteria,
    //             subkriteria.tipe,
    //             subkriteria.nilai_minimum,
    //             subkriteria.nilai_maksimum,
    //             subkriteria.op_min,
    //             subkriteria.op_max,
    //             subkriteria.id_nilai,
    //             kriteria.id_kriteria,
    //             kriteria.nama_kriteria,
    //             nilai_kategori.id_nilai,
    //             nilai_kategori.nama_nilai
    //             FROM
    //             subkriteria
    //             INNER JOIN nilai_kategori ON nilai_kategori.id_nilai = subkriteria.id_nilai
    //             INNER JOIN kriteria ON kriteria.id_kriteria = subkriteria.id_kriteria";
    // return $this->db->query($query);
    // }

    public function Kriteria()
    {
        return $this->db->table('kriteria as t1')
            ->join('subkriteria as t2', 't1.id_kriteria = t2.kriteria_id', 'LEFT')
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
