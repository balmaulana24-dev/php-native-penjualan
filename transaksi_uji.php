
<?php
require_once "koneksi_uji.php";

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $pdo->beginTransaction();

        // Membuat nomor transaksi unik
        $no_penjualan = "J" . date("ymdHis");

        // Mengambil harga produk
        $stmt = $pdo->prepare(
            "SELECT harga_jual FROM produk WHERE kode_produk = :kode"
        );

        $stmt->execute([':kode' => 'P001']);
        $harga1 = $stmt->fetchColumn();

        $stmt->execute([':kode' => 'P002']);
        $harga2 = $stmt->fetchColumn();

        if ($harga1 === false || $harga2 === false) {
            throw new Exception("Produk P001 atau P002 tidak ditemukan.");
        }

        $jumlah1 = 2;
        $jumlah2 = 3;

        $subtotal1 = $harga1 * $jumlah1;
        $subtotal2 = $harga2 * $jumlah2;
        $total = $subtotal1 + $subtotal2;

        // Menyimpan header penjualan
        $sql = "INSERT INTO penjualan
                (no_penjualan, tgl_penjualan, kode_pelanggan, total, keterangan)
                VALUES (:no, CURRENT_DATE, :pelanggan, :total, :ket)";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':no' => $no_penjualan,
            ':pelanggan' => 'C001',
            ':total' => $total,
            ':ket' => 'Pengujian transaksi database'
        ]);

        // Menyimpan detail pertama
        $sqlDetail = "INSERT INTO detil_penjualan
                      (no_penjualan, no_urut, kode_produk, jumlah, harga, subtotal)
                      VALUES (:no, :urut, :produk, :jumlah, :harga, :subtotal)";

        $stmtDetail = $pdo->prepare($sqlDetail);

        $stmtDetail->execute([
            ':no' => $no_penjualan,
            ':urut' => 1,
            ':produk' => 'P001',
            ':jumlah' => $jumlah1,
            ':harga' => $harga1,
            ':subtotal' => $subtotal1
        ]);

        // Menentukan detail kedua
        if ($_POST['mode'] === 'gagal') {
            $kodeProdukKedua = 'P999';
        } else {
            $kodeProdukKedua = 'P002';
        }

        $stmtDetail->execute([
            ':no' => $no_penjualan,
            ':urut' => 2,
            ':produk' => $kodeProdukKedua,
            ':jumlah' => $jumlah2,
            ':harga' => $harga2,
            ':subtotal' => $subtotal2
        ]);

        // Jika semua berhasil
        $pdo->commit();

        $pesan = "COMMIT BERHASIL! Semua data transaksi tersimpan.";

    } catch (Throwable $e) {

        if ($pdo->inTransaction()) {
            $pdo->rollBack();
        }

        $pesan = "ROLLBACK BERHASIL! Transaksi dibatalkan. Penyebab: "
                 . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Uji Transaksi Database</title>
</head>
<body>

<h2>Pengujian Transaksi Database</h2>

<?php if ($pesan !== ""): ?>
    <p><?= htmlspecialchars($pesan) ?></p>
<?php endif; ?>

<form method="POST">
    <button type="submit" name="mode" value="berhasil">
        Tes COMMIT
    </button>

    <button type="submit" name="mode" value="gagal">
        Tes ROLLBACK
    </button>
</form>

</body>
</html>
