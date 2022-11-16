<?php

namespace App\Controllers;

use App\Models\M_Subkriteria;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Session\Session;
use App\Controllers\BaseController;
use App\Models\M_Kriteria;

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
        $sub = new M_Subkriteria();
        $data['subkriteria'] = $this->Subkriteria->Kriteria();
        // var_dump($data);
        // die;
        // $data['subkriteria'] = $sub->findAll();
        // $data['pager'] = $sub->pager;
        // $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        return view('admin/subkriteria/index', $data);
    }

    public function add()
    {
        $kriteria = new M_Kriteria();
        $data['kriteria'] = $kriteria->findAll();
        return view('admin/subkriteria/add', $data);
    }

    public function create()
    {
        $session = session();
        $validation =  \Config\Services::validation();
        $validation->setRules(['id_kriteria' => 'required']);
        $validation->setRules(['id_nilai' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $subkriteria = new M_Subkriteria();
            $id_kriteria = $this->request->getPost('id_kriteria');
            $min = $this->request->getPost('nilai_minimum');
            $max = $this->request->getPost('nilai_maksimum');
            $nilai = $this->request->getPost('id_nilai');
            $type = $this->request->getPost('tipe');
            if (!empty($min) && !empty($max)) {
                $nama_subkriteria = '=>' . ' ' . $min . ' ' . '<=' . ' ' . $max;
            } else {
                $nama_subkriteria = $this->request->getPost('nama_subkriteria');
            }
            $subkriteria->insert([
                'id_kriteria' => $id_kriteria,
                'id_nilai' => $nilai,
                'nilai_minimum'    => $min,
                'nilai_maksimum'    => $max,
                'tipe'  => $type,
                'op_min'    => '=>',
                'op_max'    => '<=',
                'nama_subkriteria' => $nama_subkriteria,
            ]);
            $session->setFlashdata('msg', 'Data Berhasil Ditambah');
            return redirect()->to('/sub_kriteria');
        }
    }

    public function edit($id)
    {
        $subkriteria = new M_Subkriteria();
        $kriteria = new M_Kriteria();
        $data['kriteria'] = $kriteria->findAll();
        $data['detil'] = $subkriteria->find($id);
        if (!$data['detil']) {
            throw PageNotFoundException::forPageNotFound();
        }
        return view('admin/subkriteria/detil', $data);
    }

    public function update($id)
    {
        $session = session();
        $validation =  \Config\Services::validation();
        $validation->setRules(['id_kriteria' => 'required']);
        $validation->setRules(['id_nilai' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $subkriteria = new M_Subkriteria();
            $id_kriteria = $this->request->getPost('id_kriteria');
            $min = $this->request->getPost('nilai_minimum');
            $max = $this->request->getPost('nilai_maksimum');
            $nilai = $this->request->getPost('id_nilai');
            $type = $this->request->getPost('tipe');
            if (!empty($min) && !empty($max)) {
                $nama_subkriteria = '=>' . ' ' . $min . ' ' . '<=' . ' ' . $max;
            } else {
                $nama_subkriteria = $this->request->getPost('nama_subkriteria');
            }
            $subkriteria->update($id, [
                'id_kriteria' => $id_kriteria,
                'id_nilai' => $nilai,
                'nilai_minimum'    => $min,
                'nilai_maksimum'    => $max,
                'tipe'  => $type,
                'op_min'    => '=>',
                'op_max'    => '<=',
                'nama_subkriteria' => $nama_subkriteria,
            ]);
            $session->setFlashdata('msg', 'Data Berhasil Ditambah');
            return redirect()->to('/sub_kriteria');
        }
    }

    public function destroy($id)
    {
        $session = session();
        $subkriteria = new M_Subkriteria();
        $subkriteria->delete($id);

        $session->setFlashdata('msg', 'Data Berhasil Dihapus');
        return redirect()->to('/sub_kriteria');
    }
}
