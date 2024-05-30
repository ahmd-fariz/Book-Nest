<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PenebitModel;
use App\Models\PenulisModel;
use App\Models\KategoriModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class BukuController extends BaseController
{
    public function index()
    {
        $buku = new BukuModel();
        $data = $buku->getBukuWithRelations();
        return view('/home/table_buku', ['data' => $data]);
    }

    public function edit($id)
    {
        $bukuModel = new BukuModel();
        $penulisModel = new PenulisModel();
        $penerbitModel = new PenebitModel();
        $kategoriModel = new KategoriModel();

        $data['buku'] = $bukuModel->getBukuWithRelations($id);
        $data['penulis'] = $penulisModel->findAll();
        $data['penerbit'] = $penerbitModel->findAll();
        $data['kategori'] = $kategoriModel->findAll();

        return view('home/edit_buku', $data);
    }


    public function update($id)
    {
        $bukuModel = new BukuModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'sinopsis' => $this->request->getPost('sinopsis'),
            'penulis_id' => $this->request->getPost('penulis_id'),
            'penerbit_id' => $this->request->getPost('penerbit_id'),
            'tahun' => $this->request->getPost('tahun'),
            'jumlah' => $this->request->getPost('jumlah'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'loker_buku' => $this->request->getPost('loker_buku')
        ];

        if ($bukuModel->update($id, $data)) {
            session()->setFlashdata('success', 'Buku berhasil diperbarui.');
        } else {
            session()->setFlashdata('error', 'Gagal memperbarui buku.');
        }

        return redirect()->to('/BukuController');
    }

    public function delete($id)
    {
        $bukuModel = new BukuModel();
        if ($bukuModel->delete($id)) {
            session()->setFlashdata('success', 'Buku berhasil dihapus.');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus buku.');
        }

        return redirect()->to('/BukuController');
    }
}
