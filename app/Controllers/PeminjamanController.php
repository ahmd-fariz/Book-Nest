<?php

namespace App\Controllers;

use App\Models\PeminjamanModel;
use App\Models\UserModel;
use App\Models\BukuModel;
use CodeIgniter\Controller;
use DateTime;

class PeminjamanController extends Controller
{
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

        $peminjamanModel->insert($data);

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
}
