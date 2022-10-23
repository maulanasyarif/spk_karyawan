<?php

namespace App\Controllers;

use App\Models\Users;

class Home extends BaseController
{
    public function index()
    {
        helper(['form']);
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $model = new Users();
        $email = $this->request->getpost('email');
        $password = $this->request->getpost('password');
        $data = $model->where('email', $email)->first();
        if ($data) {
            $pass = $data['password'];
            $verify_pass = password_verify($password, $pass);
            if ($verify_pass) {
                $ses_data = [
                    'id'            => $data['id'],
                    'username'      => $data['username'],
                    'email'         => $data['email'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);
                if ($data['activation_code'] == 1) {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/dashboard/users');
                }
            } else {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to('/');
            }
        } else {
            $session->setFlashdata('msg', 'Email not Found');
            return redirect()->to('/');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
