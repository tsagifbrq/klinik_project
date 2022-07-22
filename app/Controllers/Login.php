<?php

namespace App\Controllers;

use App\Models\LoginModel;
use CodeIgniter\Session\Session;

class Login extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        return view('pages/login');
    }
    public function cekUser()
    {
        $userId = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $validation = \Config\Services::validation();

        $valid = $this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ], 'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
        ]);
        if (!$valid) {
            $sessError = [
                'errUser' => $validation->getError('username'),
                'errPassword' => $validation->getError('password'),
            ];

            session()->setFlashdata($sessError);
            return redirect()->to(site_url('login'));
        } else {
            $modelLogin = new LoginModel();


            $cekUserLogin  = $modelLogin->find($userId);

            if ($cekUserLogin == null) {
                $sessError = [
                    'errUser' => 'Maaf User Tidak Terdaftar',
                ];

                session()->setFlashdata($sessError);
                return redirect()->to(site_url('login'));
            } else {
                $passwordUser = $cekUserLogin['password'];
                if (password_verify($password, $passwordUser)) {
                    $simpan_session = [
                        'iduser' => $userId,
                        'namauser' => $cekUserLogin['username'],
                    ];
                    session()->set($simpan_session);
                    return redirect()->to('dashboard');
                } else {
                    $sessError = [
                        'errPassword' => 'Password Anda Salah',
                    ];

                    session()->setFlashdata($sessError);
                    return redirect()->to(site_url('login'));
                }
            }
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
