
<?php
require_once "koneksi.php";

$kode = $_GET['kode'] ?? '';

if ($kode === '') {
    die("Kode produk tidak ditemukan.");
}

try {
    $stmt = $pdo->prepare(
        "DELETE FROM produk WHERE kode_produk = :kode"
    );

    $stmt->execute([':kode' => $kode]);

    header("Location: produk.php");
    exit;

} catch (PDOException $e) {
    die("Gagal menghapus produk: " . $e->getMessage());
}
?>
