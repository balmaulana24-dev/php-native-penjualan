
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Produk</title>
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
            background: #eee;
        }
    </style>
</head>
<body>

<h2>Laporan Penjualan Produk</h2>

<table>
    <tr>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Total Kuantitas Terjual</th>
        <th>Total Nilai Penjualan</th>
    </tr>

    <?php foreach ($produk as $p): ?>
    <tr>
        <td><?= esc($p['kode_produk']) ?></td>
        <td><?= esc($p['nama_produk']) ?></td>
        <td><?= esc($p['total_kuantitas']) ?></td>
        <td>Rp <?= number_format((float)$p['total_penjualan'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

<br>
<a href="<?= base_url('produk') ?>">Kembali ke Produk</a>

</body>
</html>
