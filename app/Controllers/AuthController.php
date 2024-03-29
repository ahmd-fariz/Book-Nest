<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    // public function index(): string
    // {
    //     return view('Auth/login');
    // }
    public function login()
    {
        helper(['form']);
        $session = session();

        $data = [];

        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'password' => 'required'
            ];

            if ($this->validate($rules)) {
                $model = new User();
                $user = $model->getUserByUsername($this->request->getVar('username'));

                if ($user) {
                    if ($this->request->getVar('password') === $user['password']) {
                        $session->set('isLoggedIn', true);
                        return redirect()->to('/UserController');
                    } else {
                        $data['error'] = 'Password salah';
                    }
                } else {
                    $data['error'] = 'Username tidak ditemukan';
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }

        echo view('/Auth/login', $data);
    }
}
    







    // public function save()
    // {
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     $userModel = new User();
    //     $userData = $userModel->where('username', $username)->first();

    //     if ($userData !== null) {
    //         if (password_verify($password, $userData['password'])) { //masi error dan gatau error nya kenapa
    //             return redirect()->to('/test');
    //         } else {
    //             return redirect()->to('/UserController/index')->with('error', 'Password salah');
    //         }
    //     } else {
    //         return redirect()->to('/login')->with('error', 'Username tidak ditemukan');
    //     }
    // }

    // public function login()
    // {
    //     $login = $this->request->getPost('btn');
    //     if ($login) {
    //         $username = $this->request->getPost('username');
    //         $password = $this->request->getPost('password');

    //         $usermodel = new User;
    //         $userDataUser = $usermodel->where('username', $username)->first();
    //         $userDataPassword = $usermodel->where('password', $password)->first();

    //         // if ($username == $userDataUser && $password == $userDataPassword) {
    //         //     return redirect()->to('/UserController/index');
    //         // } else {
    //         //     $err = "password dan username salah";
    //         //     return redirect()->to('/Auth/login')->with('error', $err);
    //         // }
    //         if ($username != $userDataUser && $password != $userDataPassword) {
    //             $err = "password dan username salah";
    //             return redirect()->to('/AuthController/create')->with('error', $err);
    //         } else {
    //             return redirect()->to('/UserController/index');
    //         }
    //     }   
    // }
