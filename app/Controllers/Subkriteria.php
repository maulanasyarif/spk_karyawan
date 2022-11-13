<?php

namespace App\Controllers;

use App\Models\M_Subkriteria;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Session\Session;
use App\Controllers\BaseController;

class Subkriteria extends BaseController
{
    protected $Subkriteria;

    public function __construct()
    {
        $this->Subkriteria = new M_Subkriteria();
    }

    public function index()
    {
        // $pager = \Config\Services::pager();
        // $sub = new M_Subkriteria();
        $data['subkriteria'] = $this->Subkriteria->Kriteria();
        // $data['pager'] = $sub->pager;
        // $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        return view('admin/subkriteria/index', $data);
    }
}
