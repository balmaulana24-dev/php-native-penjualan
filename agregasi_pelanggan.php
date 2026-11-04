
<?php
require_once "koneksi.php";

$sql = "SELECT
            pl.kode_pelanggan,
            pl.nama_pelanggan,
            COUNT(p.no_penjualan) AS jumlah_transaksi,
            COALESCE(SUM(p.total), 0) AS total_penjualan
        FROM pelanggan pl
        LEFT JOIN penjualan p
            ON pl.kode_pelanggan = p.kode_pelanggan
        GROUP BY
            pl.kode_pelanggan,
            pl.nama_pelanggan
        ORDER BY pl.kode_pelanggan";

$query = $pdo->query($sql);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Agregasi Penjualan Pelanggan</title>
</head>
<body>

<h2>Agregasi Penjualan per Pelanggan</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Kode Pelanggan</th>
        <th>Nama Pelanggan</th>
        <th>Jumlah Transaksi</th>
        <th>Total Penjualan</th>
    </tr>

    <?php foreach ($data as $d): ?>
    <tr>
        <td><?= htmlspecialchars($d['kode_pelanggan']) ?></td>
        <td><?= htmlspecialchars($d['nama_pelanggan']) ?></td>
        <td><?= htmlspecialchars($d['jumlah_transaksi']) ?></td>
        <td>Rp <?= number_format((float)$d['total_penjualan'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
