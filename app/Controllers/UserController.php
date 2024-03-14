<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        // $usermodel = new User;
        // $user = $usermodel->findAll();
        // dd($user);
        return view('test');
    }
}
