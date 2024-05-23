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
}
