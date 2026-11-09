
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Penjualan</title>
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
    </style>
</head>
<body>

<h2>Laporan Transaksi Penjualan</h2>

<table>
    <tr>
        <th>No Penjualan</th>
        <th>Tanggal Penjualan</th>
        <th>Nama Pelanggan</th>
        <th>Total</th>
    </tr>

    <?php foreach ($penjualan as $p): ?>
    <tr>
        <td><?= esc($p['no_penjualan']) ?></td>
        <td><?= esc($p['tgl_penjualan']) ?></td>
        <td><?= esc($p['nama_pelanggan']) ?></td>
        <td>Rp <?= number_format((float) $p['total'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="<?= base_url('produk') ?>">Kembali ke Produk</a>

</body>
</html>
