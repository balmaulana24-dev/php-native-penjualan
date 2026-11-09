<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('/tes-koneksi', 'TesKoneksi::index');
$routes->get('/produk', 'Produk::index');
$routes->get('/produk/tambah', 'Produk::tambah');
$routes->post('/produk/simpan', 'Produk::simpan');
$routes->get('/produk/edit/(:segment)', 'Produk::edit/$1');
$routes->post('/produk/update/(:segment)', 'Produk::update/$1');
$routes->get('/produk/hapus/(:segment)', 'Produk::hapus/$1');
$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/agregasi', 'Agregasi::index');
$routes->get('/laporan-produk', 'LaporanProduk::index');
$routes->get('/tes-database-uji', 'TesDatabaseUji::index');
$routes->get('/transaksi-uji', 'TransaksiUji::index');
$routes->get('/transaksi-gagal', 'TransaksiUji::gagal');