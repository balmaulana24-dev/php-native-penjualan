
<?php
require_once "koneksi.php";

$kode = $_GET['kode'] ?? '';

$stmt = $pdo->prepare("SELECT * FROM produk WHERE kode_produk = :kode");
$stmt->execute([':kode' => $kode]);
$data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$data) {
    die("Produk tidak ditemukan.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $sql = "UPDATE produk SET
                nama_produk = :nama,
                satuan = :satuan,
                harga_jual = :jual,
                harga_beli = :beli,
                stok = :stok,
                deskripsi = :deskripsi
                WHERE kode_produk = :kode";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nama' => $_POST['nama_produk'],
            ':satuan' => $_POST['satuan'],
            ':jual' => $_POST['harga_jual'],
            ':beli' => $_POST['harga_beli'],
            ':stok' => $_POST['stok'],
            ':deskripsi' => $_POST['deskripsi'],
            ':kode' => $kode
        ]);

        header("Location: produk.php");
        exit;

    } catch (PDOException $e) {
        $pesan = "Gagal mengubah produk: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>

<h2>Edit Produk</h2>

<?php if (isset($pesan)): ?>
    <p><?= htmlspecialchars($pesan) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Kode Produk:</label><br>
    <input type="text" value="<?= htmlspecialchars($data['kode_produk']) ?>" disabled><br><br>

    <label>Nama Produk:</label><br>
    <input type="text" name="nama_produk" value="<?= htmlspecialchars($data['nama_produk']) ?>" required><br><br>

    <label>Satuan:</label><br>
    <input type="text" name="satuan" value="<?= htmlspecialchars($data['satuan']) ?>" required><br><br>

    <label>Harga Jual:</label><br>
    <input type="number" name="harga_jual" value="<?= htmlspecialchars($data['harga_jual']) ?>" min="0" required><br><br>

    <label>Harga Beli:</label><br>
    <input type="number" name="harga_beli" value="<?= htmlspecialchars($data['harga_beli']) ?>" min="0" required><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="<?= htmlspecialchars($data['stok']) ?>" min="0" required><br><br>

    <label>Deskripsi:</label><br>
    <textarea name="deskripsi"><?= htmlspecialchars($data['deskripsi'] ?? '') ?></textarea><br><br>

    <button type="submit">Simpan Perubahan</button>
</form>

<br>
<a href="produk.php">Kembali ke Data Produk</a>

</body>
</html>
