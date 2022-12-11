<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Kriteria;

class Perbandingan extends BaseController
{

    public function index()
    {
        return view('admin/perbandingan/index');
    }

    public function getHtml()
    {
        $output = array();
        $kriteria = new M_Kriteria();
        $data['kriteria'] = $kriteria->findAll();
        foreach ($data['kriteria'] as $k) {
            $output[$k['id_kriteria']] = $k['nama_kriteria'];
        }
        $d['arr'] = $output;

        return view('admin/perbandingan/matrikutama', $d);
    }
}
