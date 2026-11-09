<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProdukModel;

class Produk extends BaseController
{
    protected $produk;

    public function __construct()
    {
        $this->produk = new ProdukModel();
    }

    // Menampilkan produk dan pencarian
    public function index()
    {
        $cari = $this->request->getGet('cari');

        $builder = $this->produk;

        if ($cari) {
            $builder = $builder->like('nama_produk', $cari);
        }

        $data['produk'] = $builder->findAll();

        return view('produk/index', $data);
    }

    // Menampilkan form tambah
    public function tambah()
    {
        return view('produk/tambah');
    }

    // Menyimpan produk baru
    public function simpan()
    {
        $this->produk->insert([
            'kode_produk' => $this->request->getPost('kode_produk'),
            'nama_produk' => $this->request->getPost('nama_produk'),
            'satuan'      => $this->request->getPost('satuan'),
            'harga_jual'  => $this->request->getPost('harga_jual'),
            'harga_beli'  => $this->request->getPost('harga_beli'),
            'stok'        => $this->request->getPost('stok'),
            'deskripsi'   => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/produk');
    }

    // Menampilkan form edit
    public function edit($kode)
    {
        $data['produk'] = $this->produk->find($kode);

        if (!$data['produk']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('produk/edit', $data);
    }

    // Memperbarui produk
    public function update($kode)
    {
        $this->produk->update($kode, [
            'nama_produk' => $this->request->getPost('nama_produk'),
            'satuan'      => $this->request->getPost('satuan'),
            'harga_jual'  => $this->request->getPost('harga_jual'),
            'harga_beli'  => $this->request->getPost('harga_beli'),
            'stok'        => $this->request->getPost('stok'),
            'deskripsi'   => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to('/produk');
    }

    // Menghapus produk
    public function hapus($kode)
    {
        $this->produk->delete($kode);

        return redirect()->to('/produk');
    }
}
