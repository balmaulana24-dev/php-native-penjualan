
<?php
require_once "koneksi.php";

$sql = "SELECT
            p.no_penjualan,
            p.tgl_penjualan,
            pl.nama_pelanggan,
            p.total
        FROM penjualan p
        INNER JOIN pelanggan pl
            ON p.kode_pelanggan = pl.kode_pelanggan
        ORDER BY p.tgl_penjualan DESC";

$query = $pdo->query($sql);
$penjualan = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transaksi Penjualan</title>
</head>
<body>

<h2>Data Transaksi Penjualan</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No. Penjualan</th>
        <th>Tanggal</th>
        <th>Nama Pelanggan</th>
        <th>Total Transaksi</th>
    </tr>

    <?php foreach ($penjualan as $p): ?>
    <tr>
        <td><?= htmlspecialchars($p['no_penjualan']) ?></td>
        <td><?= htmlspecialchars($p['tgl_penjualan']) ?></td>
        <td><?= htmlspecialchars($p['nama_pelanggan']) ?></td>
        <td>Rp <?= number_format((float)$p['total'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
