<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\BukuModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
   public function index()
    {
        // $usermodel = new User;
        // $user = $usermodel->findAll();
         // dd($user);
        return view('/index/index');
    }
   public function library()
    {
        $bukumodel = new BukuModel;
        $buku = $bukumodel->findAll();
         // dd($user);
        return view('/index/library', ['buku' => $buku]);
    }
}
