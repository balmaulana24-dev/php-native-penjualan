<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Agregasi extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $data['pelanggan'] = $db->table('penjualan p')
            ->select('
                pl.kode_pelanggan,
                pl.nama_pelanggan,
                COUNT(p.no_penjualan) AS jumlah_transaksi,
                SUM(p.total) AS total_penjualan
            ')
            ->join('pelanggan pl', 'pl.kode_pelanggan = p.kode_pelanggan')
            ->groupBy('pl.kode_pelanggan, pl.nama_pelanggan')
            ->get()
            ->getResultArray();

        return view('agregasi/index', $data);
    }
}
