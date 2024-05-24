<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $table = 'tb_peminjaman';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id',
        'buku_id',
        'jumlah_buku',
        'tgl_pinjam',
        'tgl_kembali',
        'batas_waktu',
        'status',
        'denda'
    ];

    public function getPeminjamanWithRelations()
    {
        return $this->select('tb_peminjaman.*, tb_user.nama as user_nama, tb_buku.judul as buku_nama')
                    ->join('tb_user', 'tb_user.id = tb_peminjaman.user_id')
                    ->join('tb_buku', 'tb_buku.id = tb_peminjaman.buku_id')
                    ->findAll();
    }  
}
