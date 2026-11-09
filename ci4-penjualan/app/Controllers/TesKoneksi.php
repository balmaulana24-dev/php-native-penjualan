<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TesKoneksi extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect();
            $db->query('SELECT 1');

            return 'Koneksi CI4 ke PostgreSQL Berhasil!';
      } catch (\Throwable $e) {
    return 'Koneksi Gagal: ' . $e->getMessage();
}
    }
}
