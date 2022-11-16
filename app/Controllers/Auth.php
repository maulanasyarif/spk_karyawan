<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Subkriteria;
use App\Models\M_Kriteria;
use App\Models\M_Karyawan;

class Auth extends BaseController
{
    public function index()
    {
        $karyawan = new M_Karyawan();
        $kriteria = new M_Kriteria();
        $subkriteria = new M_Subkriteria();
        $data['kriteria'] = $kriteria->countAll();
        $data['subkriteria'] = $subkriteria->countAll();
        $data['karyawan'] = $karyawan->countAll();

        return view('admin/dashboard', $data);
    }

    public function users()
    {
        return view('users/dashboard');
    }
}
