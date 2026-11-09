<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use Config\Database;

class TransaksiUji extends Controller
{
    public function index()
    {
        $db = Database::connect('uji');

        $db->transBegin();

        try {
            // Simpan header penjualan
            $db->table('penjualan')->insert([
                'no_penjualan' => 'UJI001',
                'tgl_penjualan' => date('Y-m-d'),
                'kode_pelanggan' => 'C001',
                'total' => 11000,
                'keterangan' => 'Transaksi pengujian CI4'
            ]);

            // Simpan detail pertama
            $db->table('detil_penjualan')->insert([
                'no_penjualan' => 'UJI001',
                'no_urut' => 1,
                'kode_produk' => 'P001',
                'jumlah' => 1,
                'harga' => 8000,
                'subtotal' => 8000
            ]);

            // Simpan detail kedua
            $db->table('detil_penjualan')->insert([
                'no_penjualan' => 'UJI001',
                'no_urut' => 2,
                'kode_produk' => 'P002',
                'jumlah' => 1,
                'harga' => 3000,
                'subtotal' => 3000
            ]);

            if ($db->transStatus() === false) {
                throw new \Exception('Transaksi gagal');
            }

            $db->transCommit();

            return 'COMMIT BERHASIL!';

        } catch (\Throwable $e) {
            $db->transRollback();

            return 'ROLLBACK: ' . $e->getMessage();
        }
    }
}
