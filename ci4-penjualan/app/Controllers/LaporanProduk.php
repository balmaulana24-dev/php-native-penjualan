<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class LaporanProduk extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $data['produk'] = $db->table('detil_penjualan dp')
            ->select('
                pr.kode_produk,
                pr.nama_produk,
                SUM(dp.jumlah) AS total_kuantitas,
                SUM(dp.subtotal) AS total_penjualan
            ')
            ->join('produk pr', 'pr.kode_produk = dp.kode_produk')
            ->groupBy('pr.kode_produk, pr.nama_produk')
            ->get()
            ->getResultArray();

        return view('laporan_produk/index', $data);
    }
}
