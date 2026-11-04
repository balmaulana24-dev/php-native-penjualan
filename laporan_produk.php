
<?php
require_once "koneksi.php";

$sql = "SELECT
            pr.kode_produk,
            pr.nama_produk,
            COALESCE(SUM(dp.jumlah), 0) AS total_kuantitas,
            COALESCE(SUM(dp.subtotal), 0) AS total_penjualan
        FROM produk pr
        LEFT JOIN detil_penjualan dp
            ON pr.kode_produk = dp.kode_produk
        GROUP BY
            pr.kode_produk,
            pr.nama_produk
        ORDER BY pr.kode_produk";

$query = $pdo->query($sql);
$data = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Penjualan Produk</title>
</head>
<body>

<h2>Laporan Penjualan per Produk</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>Kode Produk</th>
        <th>Nama Produk</th>
        <th>Total Kuantitas Terjual</th>
        <th>Total Nilai Penjualan</th>
    </tr>

    <?php foreach ($data as $d): ?>
    <tr>
        <td><?= htmlspecialchars($d['kode_produk']) ?></td>
        <td><?= htmlspecialchars($d['nama_produk']) ?></td>
        <td><?= htmlspecialchars($d['total_kuantitas']) ?></td>
        <td>Rp <?= number_format((float)$d['total_penjualan'], 0, ',', '.') ?></td>
    </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
