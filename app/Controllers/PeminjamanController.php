<?php

namespace App\Controllers;

use DateTime;
use App\Models\BukuModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use App\Models\PeminjamanModel;
use App\Models\DetailPeminjamanModel;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = new PeminjamanModel();
        $data = $peminjaman->getPeminjamanWithRelations();
        return view('/home/table_peminjaman', ['data' => $data]);
    }

    public function create()
    {
        $userModel = new UserModel();
        $bukuModel = new BukuModel();

        $data['users'] = $userModel->findAll();
        $data['bukus'] = $bukuModel->findAll();

        return view('/home/peminjaman', $data);
    }

    public function store()
    {
        $peminjamanModel = new PeminjamanModel();

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'buku_id' => $this->request->getPost('buku_id'),
            'jumlah_buku' => $this->request->getPost('jumlah_buku'),
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'batas_waktu' => $this->calculateBatasWaktu($this->request->getPost('tgl_pinjam')),
            'status' => 'Dipinjam',
            'denda' => 0
        ];
        if ($peminjamanModel->insert($data)) {
            session()->setFlashdata('success', 'Peminjaman berhasil ditambahkan.');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan peminjaman.');
        }
    
        return redirect()->to('/peminjaman/create');
    }

    private function calculateBatasWaktu($tgl_pinjam)
    {
        $tgl_pinjam_dt = new DateTime($tgl_pinjam);
        $tgl_pinjam_dt->modify('+7 day'); // batas waktu 7 hari
        return $tgl_pinjam_dt->format('Y-m-d');
    }

    public function updateStatus()
    {
        $peminjamanModel = new PeminjamanModel();
        $peminjamans = $peminjamanModel->where('status', 'Dipinjam')->findAll();

        foreach ($peminjamans as $peminjaman) {
            $batas_waktu_dt = new DateTime($peminjaman['batas_waktu']);
            $tgl_kembali_dt = new DateTime($peminjaman['tgl_kembali']);

            if ($tgl_kembali_dt > $batas_waktu_dt) {
                $peminjaman['status'] = 'Kembali';
                $peminjaman['denda'] = $this->calculateDenda($peminjaman['batas_waktu'], $peminjaman['tgl_kembali']);
                $peminjamanModel->save($peminjaman);
            }
        }
    }

    private function calculateDenda($batas_waktu, $tgl_kembali)
    {
        $batas_waktu_dt = new DateTime($batas_waktu);
        $tgl_kembali_dt = new DateTime($tgl_kembali);
        $interval = $tgl_kembali_dt->diff($batas_waktu_dt);
        $days_late = $interval->days;

        return $days_late * 1000; // Misal denda 1000 per hari
    }

    public function return()
    {
        $peminjamanModel = new PeminjamanModel();

        $data = [
            'tgl_kembali' => $this->request->getPost('tgl_kembali'),
            'status' => 'Kembali',
        ];

        // Cari peminjaman berdasarkan ID
        $peminjaman = $peminjamanModel->find($this->request->getPost('peminjaman_id'));

        // Hitung denda jika ada keterlambatan
        if (new DateTime($data['tgl_kembali']) > new DateTime($peminjaman['batas_waktu'])) {
            $data['denda'] = $this->calculateDenda($peminjaman['batas_waktu'], $data['tgl_kembali']);
        } else {
            $data['denda'] = 0;
        }

        // Update data peminjaman
        $peminjamanModel->update($this->request->getPost('peminjaman_id'), $data);

        return redirect()->to('/peminjaman/return');
    }
    public function createReturn()
    {
        $peminjamanModel = new PeminjamanModel();

        $peminjamans = $peminjamanModel->select('tb_peminjaman.id, tb_buku.judul as judul_buku, tb_user.nama as nama_user, tb_peminjaman.tgl_pinjam')
            ->join('tb_user', 'tb_user.id = tb_peminjaman.user_id')
            ->join('tb_buku', 'tb_buku.id = tb_peminjaman.buku_id')
            ->where('status', 'Dipinjam')
            ->findAll();

        $data['peminjamans'] = $peminjamans;

        return view('/home/pengembalian_buku', $data);
    }

    public function edit($id)
    {
        $peminjamanModel = new PeminjamanModel();
        $peminjaman = $peminjamanModel->find($id);

        $userModel = new UserModel();
        $bukuModel = new BukuModel();

        $data['users'] = $userModel->findAll();
        $data['bukus'] = $bukuModel->findAll();
        $data['peminjaman'] = $peminjaman;

        return view('/home/edit_peminjaman', $data);
    }

    public function update($id)
    {
        $peminjamanModel = new PeminjamanModel();

        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'buku_id' => $this->request->getPost('buku_id'),
            'jumlah_buku' => $this->request->getPost('jumlah_buku'),
            'tgl_pinjam' => $this->request->getPost('tgl_pinjam'),
            'batas_waktu' => $this->calculateBatasWaktu($this->request->getPost('tgl_pinjam')),
            'status' => $this->request->getPost('status'),
            'denda' => $this->request->getPost('denda'),
        ];

        $peminjamanModel->update($id, $data);

        return redirect()->to('/peminjamancontroller')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function delete($id)
    {
        $peminjamanModel = new PeminjamanModel();
        $peminjamanModel->delete($id);

        return redirect()->to('/peminjamancontroller')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}

