<?php

namespace App\Controllers;

use App\Models\M_Subkriteria;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Session\Session;

use App\Controllers\BaseController;

class Subkriteria extends BaseController
{
    // protected $mk;
    // public function __construct()
    // {
    //     $this->mk = new M_Subkriteria();
    // }

    public function index()
    {
        $pager = \Config\Services::pager();
        $sub = new M_Subkriteria();
        $data['subkriteria'] = $sub->paginate(10);
        $data['pager'] = $sub->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        return view('admin/subkriteria/index', $data);
    }
}
