
<?php
require_once "koneksi.php";

try {
    $query = $pdo->query("SELECT * FROM produk ORDER BY kode_produk");
    $produk = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
</head>
<body>

    <h2>Data Produk</h2>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Kode Produk</th>
            <th>Nama Produk</th>
            <th>Satuan</th>
            <th>Harga Jual</th>
            <th>Harga Beli</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach ($produk as $p): ?>
        <tr>
            <td><?= htmlspecialchars($p['kode_produk']) ?></td>
            <td><?= htmlspecialchars($p['nama_produk']) ?></td>
            <td><?= htmlspecialchars($p['satuan']) ?></td>
            <td><?= htmlspecialchars($p['harga_jual']) ?></td>
            <td><?= htmlspecialchars($p['harga_beli']) ?></td>
            <td><?= htmlspecialchars($p['stok']) ?></td>
            <td>
 <td>
    <a href="edit_produk.php?kode=<?= urlencode($p['kode_produk']) ?>">Edit</a>

    |

    <a href="hapus_produk.php?kode=<?= urlencode($p['kode_produk']) ?>"
       onclick="return confirm('Yakin ingin menghapus produk ini?')">
       Hapus
    </a>
</td>
        </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
