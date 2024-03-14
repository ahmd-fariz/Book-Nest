<?php

namespace App\Controllers;

use App\Models\User;

class AuthController extends BaseController
{
    public function create(): string
    {
        return view('Auth/login');
    }
    public function save()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $userModel = new User();
        $userData = $userModel->where('username', $username)->first();

        if ($userData !== null) {
            if (password_verify($password, $userData['password'])) { //masi error dan gatau error nya kenapa
                return redirect()->to('/test');
            } else {
                return redirect()->to('/UserController/index')->with('error', 'Password salah');
            }
        } else {
            return redirect()->to('/login')->with('error', 'Username tidak ditemukan');
        }

    }
}
