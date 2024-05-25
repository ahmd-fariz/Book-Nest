<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PenulisModel;
use App\Models\PenebitModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class InputController extends Controller
{
    //insert buku
    public function create()
    {
        $penulisModel = new PenulisModel();
        $penerbitModel = new PenebitModel();
        $kategoriModel = new KategoriModel();

        $data['penulis'] = $penulisModel->findAll();
        $data['penerbit'] = $penerbitModel->findAll();
        $data['kategori'] = $kategoriModel->findAll();

        return view('/home/buku', $data);
    }

    public function store()
    {
        $bukuModel = new BukuModel();
        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $newName = $foto->getRandomName();
            $foto->move(WRITEPATH . 'uploads', $newName);

            $data = [
                'judul' => $this->request->getPost('judul'),
                'sinopsis' => $this->request->getPost('sinopsis'),
                'penulis_id' => $this->request->getPost('penulis_id'),
                'penerbit_id' => $this->request->getPost('penerbit_id'),
                'tahun' => $this->request->getPost('tahun'),
                'jumlah' => $this->request->getPost('jumlah'),
                'kategori_id' => $this->request->getPost('kategori_id'),
                'loker_buku' => $this->request->getPost('loker_buku'),
                'foto' => $newName
            ];

            $bukuModel->insert($data);

            return redirect()->to('/inputcontroller/create')->with('success', 'Buku berhasil ditambahkan.');
        } else {
            return redirect()->to('/inputcontroller/create')->with('error', 'Gagal mengunggah foto.');
        }
    }

    //insert kategori
    public function CreateKategori(){
        return view('/home/kategori');
    }
    
    public function storekategori(){
        $kategoriModel = new KategoriModel;
        
        $data = [
            'nama' =>  $this->request->getpost('kategori')
        ];
        $kategoriModel->insert($data);

        return redirect()->to('/inputcontroller/CreateKategori');
    }
}
