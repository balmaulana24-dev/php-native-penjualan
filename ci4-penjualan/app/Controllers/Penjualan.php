<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Database;

class Penjualan extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $data['penjualan'] = $db->table('penjualan p')
            ->select('p.no_penjualan, p.tgl_penjualan, pl.nama_pelanggan, p.total')
            ->join('pelanggan pl', 'pl.kode_pelanggan = p.kode_pelanggan')
            ->get()
            ->getResultArray();

        return view('penjualan/index', $data);
    }
}
