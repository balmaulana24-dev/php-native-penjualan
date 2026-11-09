<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TesDatabaseUji extends Controller
{
    public function index()
    {
        try {
            $db = Database::connect('uji');
            $db->query('SELECT 1');

            return 'Koneksi Database Uji Berhasil!';
        } catch (\Throwable $e) {
            return 'Koneksi Gagal: ' . $e->getMessage();
        }
    }
}
