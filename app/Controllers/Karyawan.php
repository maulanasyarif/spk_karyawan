<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\M_Karyawan;
use CodeIgniter\Exceptions\PageNotFoundException;


class Karyawan extends BaseController
{
    public function index()
    {
        $pager = \Config\Services::pager();
        $karyawan = new M_Karyawan();
        $data['karyawan'] = $karyawan->paginate(10);
        $data['pager'] = $karyawan->pager;
        $data['page'] = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
        return view('admin/karyawan/index', $data);
    }

    public function add()
    {
        return view('admin/karyawan/add');
    }

    public function create()
    {
        $session = session();
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_sekolah' => 'required',
            'nama_kepsek'   => 'required',
            'alamat_sekolah' => 'required',
            'no_telpon'     => 'required',
            'visi'          => 'required',
            'misi'          => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $karyawan = new M_Karyawan();
            $karyawan->insert([
                'nama_sekolah'      => $this->request->getPost('nama_sekolah'),
                'nama_kepsek'       => $this->request->getPost('nama_kepsek'),
                'alamat_sekolah'    => $this->request->getPost('alamat_sekolah'),
                'no_telpon'         => $this->request->getPost('no_telpon'),
                'visi'              => $this->request->getPost('visi'),
                'misi'              => $this->request->getPost('misi'),
            ]);

            $session->setFlashdata('msg', 'Data Berhasil Disimpan');
            return redirect()->to('/karyawan');
        }
    }

    public function detil_karyawan($id)
    {
        $karyawan = new M_Karyawan();
        $data['detil'] = $karyawan->where('id_sekolah', $id)->first();

        if (!$data['detil']) {
            throw PageNotFoundException::forPageNotFound();
        }

        return view('admin/karyawan/edit', $data);
    }

    public function update($id)
    {
        $session = session();
        $karyawan = new M_Karyawan();
        $data['detil'] = $karyawan->where('id_sekolah', $id)->first();

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'nama_sekolah' => 'required',
            'nama_kepsek'   => 'required',
            'alamat_sekolah' => 'required',
            'no_telpon'     => 'required',
            'visi'          => 'required',
            'misi'          => 'required',
        ]);

        $isDataValid = $validation->withRequest($this->request)->run();

        if ($isDataValid) {
            $karyawan = new M_Karyawan();
            $karyawan->update($id, [
                'nama_sekolah'      => $this->request->getPost('nama_sekolah'),
                'nama_kepsek'       => $this->request->getPost('nama_kepsek'),
                'alamat_sekolah'    => $this->request->getPost('alamat_sekolah'),
                'no_telpon'         => $this->request->getPost('no_telpon'),
                'visi'              => $this->request->getPost('visi'),
                'misi'              => $this->request->getPost('misi'),
            ]);

            $session->setFlashdata('msg', 'Data Berhasil Diubah');
            return redirect()->to('/karyawan');
        }
    }

    public function destroy($id)
    {
        $session = session();
        $karyawan = new M_Karyawan();
        $karyawan->delete($id);

        $session->setFlashdata('msg', 'Data Berhasil Dihapus');
        return redirect()->to('/karyawan');
    }
}
