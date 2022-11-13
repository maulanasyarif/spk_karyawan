<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    // protected $table = 'users';
    // protected $primaryKey = 'id';
    // protected $allowedFields = ['id', 'username', 'email', 'password'];

    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'ip_address', 'username', 'password', 'salt', 'email', 'activation_code', 'forgotten_password_code', 'forgotten_password_time', 'remember_code', 'created_on', 'last_login', 'active', 'first_name', 'last_name', 'company', 'phone'
    ];

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
