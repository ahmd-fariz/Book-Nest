<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\PeminjamanController;

class Cron extends Controller
{
    public function updateStatus()
    {
        $peminjamanController = new PeminjamanController();
        $peminjamanController->updateStatus();
    }
}
