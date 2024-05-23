<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'tb_buku';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'judul', 
        'penulis_id', 
        'penerbit_id', 
        'tahun', 
        'jumlah', 
        'kategori_id', 
        'loker_buku'
    ];

    public function getBukuWithRelations()
    {
        return $this->select('tb_buku.*, tb_penulis.nama, tb_penebit.nama, tb_kategori.nama')
                    ->join('tb_penulis', 'tb_penulis.id = tb_buku.penulis_id')
                    ->join('tb_penebit', 'tb_penebit.id = tb_buku.penerbit_id')
                    ->join('tb_kategori', 'tb_kategori.id = tb_buku.kategori_id')
                    ->findAll();
    }  
}
