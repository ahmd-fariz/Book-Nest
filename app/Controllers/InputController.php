<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Buku; 

class InputController extends BaseController
{
    public function index() {
        $bukuModel = new Buku();
        return view('/home/buku');
    }

    public function submit() {
        $judul = $this->request->getPost('judul');
        $tahun = $this->request->getPost('tahun');
        $jumlah = $this->request->getPost('jumlah');
        $loker = $this->request->getPost('loker');

        $bukuModel = new Buku(); 
        $bukuModel->save_data($judul, $tahun, $jumlah, $loker);
        return redirect()->to('inputController/success');
    }

    public function success() {
        echo "Data berhasil disimpan!";
    }
}
