<?php

namespace App\Models;

use CodeIgniter\Model;

class PenebitModel extends Model
{
    protected $table = 'tb_penebit';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama'];
}
