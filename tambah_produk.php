
<?php
require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $sql = "INSERT INTO produk
                (kode_produk, nama_produk, satuan, harga_jual, harga_beli, stok, deskripsi)
                VALUES (:kode, :nama, :satuan, :jual, :beli, :stok, :deskripsi)";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':kode' => $_POST['kode_produk'],
            ':nama' => $_POST['nama_produk'],
            ':satuan' => $_POST['satuan'],
            ':jual' => $_POST['harga_jual'],
            ':beli' => $_POST['harga_beli'],
            ':stok' => $_POST['stok'],
            ':deskripsi' => $_POST['deskripsi']
        ]);

        header("Location: produk.php");
        exit;

    } catch (PDOException $e) {
        $pesan = "Gagal menambahkan produk: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>

<h2>Tambah Produk</h2>

<?php if (isset($pesan)): ?>
    <p><?= htmlspecialchars($pesan) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Kode Produk:</label><br>
    <input type="text" name="kode_produk" required><br><br>

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" required><br><br>

    <label>Satuan:</label><br>
    <input type="text" name="satuan" required><br><br>

    <label>Harga Jual:</label><br>
    <input type="number" name="harga_jual" min="0" required><br><br>

    <label>Harga Beli:</label><br>
    <input type="number" name="harga_beli" min="0" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" min="0" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"></textarea><br><br>

    <button type="submit">Simpan Produk</button>
</form>

<br>
<a href="produk.php">Kembali ke Data Produk</a>

</body>
</html>
