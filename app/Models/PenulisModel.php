<?php

namespace App\Models;

use CodeIgniter\Model;

class PenulisModel extends Model
{
    protected $table = 'tb_penulis';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama'];
}
