<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Alternatif;
use App\Models\M_AlternatifNilai;
use App\Models\M_Karyawan;
use App\Models\M_Kriteria;
use App\Models\M_Subkriteria;

class Alternatif extends BaseController
{
    protected $alternatif;

    public function __construct()
    {
        $this->alternatif = new M_Alternatif();
    }
    public function index()
    {
        $data['alternatif'] = $this->alternatif->sekolah();
        // var_dump($data);
        // die;
        return view('admin/alternatif/index', $data);
    }

    public function add()
    {
        $karyawan = new M_Karyawan();
        $kriteria = new M_Kriteria();
        $subkriteria = new M_Subkriteria();
        $get_karyawan = $karyawan->findAll();
        $get_kriteria = $kriteria->findAll();

        $id = $kriteria->select('id_kriteria')->get()->getResultArray();
        $get_subkriteria = '';
        $subs = [];

        foreach ($id as $dt) {
            $get_subkriteria = $subkriteria->where('id_kriteria', $dt)->get()->getResultArray();
            array_push($subs, $get_subkriteria);
        }

        // var_dump($subs);
        // die;
        return view('admin/alternatif/add', [
            'karyawan'      => $get_karyawan,
            'kriteria'      => $get_kriteria,
            'subkriteria'   => $subs,
        ]);
    }

    public function create()
    {
        $session = session();
        $validation =  \Config\Services::validation();
        $validation->setRules(['id_sekolah' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        $id_sekolah = $this->request->getPost('id_sekolah');
        $kriteria = $this->request->getPost('kriteria');
        if ($isDataValid) {
            $alternatif = new M_Alternatif();
            $alternatif->insert([
                'id_sekolah'    => $id_sekolah,
            ]);

            $alterNilai = new M_AlternatifNilai();
            foreach ($kriteria as $rK => $rV) {
                $data = array(
                    'id_alternatif' => $alternatif->insertID,
                    'id_kriteria' => $rK,
                    'id_subkriteria' => $rV,
                    'id_nilai' => $rV,
                );
                $alterNilai->insert($data);
            }
        }
        $session->setFlashdata('msg', 'Data Berhasil Ditambah');
        return redirect()->to('/alternatif');
    }

    public function detil($id)
    {
        $alternatif = new M_Alternatif();
        $kriteria = new M_Kriteria();
        $subkriteria = new M_Subkriteria();
        $karyawan = new M_Karyawan();
        $alterNilai = new M_AlternatifNilai();

        $get_alternatif = $alternatif->find($id);
        $id_karyawan = $get_alternatif['id_sekolah'];
        $get_karyawan = $karyawan->find($id_karyawan);
        $get_kriteria = $kriteria->findAll();
        $get_alternatifNilai = $alterNilai->where('id_alternatif', $id)->get()->getResultArray();


        $id_kriteria = $kriteria->select('id_kriteria')->get()->getResultArray();
        $get_subkriteria = '';
        $subs = [];

        foreach ($id_kriteria as $dt) {
            $get_subkriteria = $subkriteria->where('id_kriteria', $dt)->get()->getResultArray();
            array_push($subs, $get_subkriteria);
        }
        // var_dump($get_alternatifNilai);
        // die;
        return view('admin/alternatif/detil', [
            'karyawan'          => $get_karyawan,
            'alternatif'        => $get_alternatif,
            'alternatifNilai'   => $get_alternatifNilai,
            'kriteria'          => $get_kriteria,
            'subkriteria'       => $subs,
        ]);
    }

    public function update($id)
    {
        $session = session();
        $alterNilai = new M_AlternatifNilai();
        $kriteria = $this->request->getPost('kriteria');
        $id_alternatifNilai = $this->request->getPost('id_alternatif_nilai');
        // var_dump($kriteria);
        // die;
        foreach ($kriteria as $rK => $rV) {
            $id = explode(':', $rK);
            $id_alternatifNilai = $id[1];
            $id_kriteria = $id[0];
            // var_dump($id);
            // die;
            $data = array(
                'id_alternatif_nilai' => $id_alternatifNilai,
                'id_kriteria' => $id_kriteria,
                'id_subkriteria' => $rV,
                'id_nilai' => $rV,
            );
            var_dump($data);
            // $alterNilai->update($id_alternatifNilai, [
            //     'id_kriteria' => $id_kriteria,
            //     'id_subkriteria' => $rV,
            //     'id_nilai' => $rV,
            // ]);
        }
        die;
        $session->setFlashdata('msg', 'Data Berhasil Di Perbaharui');
        return redirect()->to('/alternatif');
    }
}
