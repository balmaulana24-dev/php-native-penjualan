
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #eeeeee;
        }
        a, button {
            padding: 7px 12px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<h2>Data Produk Penjualan</h2>

<a href="<?= base_url('produk/tambah') ?>">+ Tambah Produk</a>

<form method="get" action="<?= base_url('produk') ?>">
    <input type="text" name="cari"
           placeholder="Cari nama produk..."
           value="<?= esc($_GET['cari'] ?? '') ?>">
    <button type="submit">Cari</button>
    <a href="<?= base_url('produk') ?>">Reset</a>
</form>

<table>
    <tr>
        <th>Kode</th>
        <th>Nama Produk</th>
        <th>Satuan</th>
        <th>Harga Jual</th>
        <th>Harga Beli</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($produk as $p): ?>
    <tr>
        <td><?= esc($p['kode_produk']) ?></td>
        <td><?= esc($p['nama_produk']) ?></td>
        <td><?= esc($p['satuan']) ?></td>
        <td><?= esc($p['harga_jual']) ?></td>
        <td><?= esc($p['harga_beli']) ?></td>
        <td><?= esc($p['stok']) ?></td>
        <td>
            <a href="<?= base_url('produk/edit/'.$p['kode_produk']) ?>">Edit</a>
            <a href="<?= base_url('produk/hapus/'.$p['kode_produk']) ?>"
               onclick="return confirm('Yakin ingin menghapus produk ini?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
