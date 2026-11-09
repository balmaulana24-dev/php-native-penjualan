
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Agregasi Pelanggan</title>
    <style>
        body {
            font-family: Arial;
            margin: 30px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #eee;
        }
    </style>
</head>
<body>

<h2>Agregasi Penjualan per Pelanggan</h2>

<table>
    <tr>
        <th>Kode Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Transaksi</th>
        <th>Total Penjualan</th>
    </tr>

    <?php foreach ($pelanggan as $p): ?>
    <tr>
        <td><?= esc($p['kode_pelanggan']) ?></td>
        <td><?= esc($p['nama_pelanggan']) ?></td>
        <td><?= esc($p['jumlah_transaksi']) ?></td>
        <td>Rp <?= number_format((float)$p['total_penjualan'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="<?= base_url('produk') ?>">Kembali ke Produk</a>

</body>
</html>
