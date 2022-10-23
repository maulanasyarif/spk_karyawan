<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\M_Kriteria;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Session\Session;

class Kriteria extends BaseController
{

    public function kriteria()
    {
        $kriteria = new M_Kriteria();
        $data['kriteria'] = $kriteria->findAll();
        return view('admin/kriteria/kriteria', $data);
    }

    public function add()
    {
        return view('admin/kriteria/add_kriteria');
    }

    public function create()
    {
        $session = session();
        $validation =  \Config\Services::validation();
        $validation->setRules(['nama_kriteria' => 'required']);
        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $kriteria = new M_Kriteria();
            $kriteria->insert([
                "nama_kriteria" => $this->request->getPost('nama_kriteria'),
            ]);

            $session->setFlashdata('msg', 'Data Berhasil Ditambah');
            return redirect()->to('/kriteria');
        }
    }

    public function detil_kriteria($id)
    {
        $kriteria = new M_Kriteria();
        $data['detil'] = $kriteria->where('id_kriteria', $id)->first();

        if (!$data['detil']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/kriteria/detil_kriteria', $data);
    }

    public function update($id)
    {
        $session = session();
        $kriteria = new M_Kriteria();
        $data['kriteria'] = $kriteria->where('id_kriteria', $id)->first();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'id_kriteria' => 'required',
            'nama_kriteria' => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();
        if ($isDataValid) {
            $kriteria->update($id, [
                "nama_kriteria" => $this->request->getPost('nama_kriteria'),
            ]);

            $session->setFlashdata('msg', 'Data Berhasil Diubah');
            return redirect()->to('/kriteria');
        }
    }

    public function destroy($id)
    {
        $session = session();
        $kriteria = new M_Kriteria();
        $kriteria->delete($id);

        $session->setFlashdata('msg', 'Data Berhasil Dihapus');
        return redirect()->to('/kriteria');
    }
}