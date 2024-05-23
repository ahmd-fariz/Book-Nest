<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\BukuModel;

class BukuController extends BaseController
{
    public function index()
    {
        $buku = new BukuModel();
        $data = $buku->findAll();
        return view('/home/table_buku', ['data' => $data]);
    }
}
