
<?php
$host = "localhost";
$port = "5432";
$dbname = "db_penjualan";
$user = "postgres";
$password = "PASSWORD_POSTGRES_KAMU";

try {
    $pdo = new PDO(
        "pgsql:host=$host;port=$port;dbname=$dbname",
        $user,
        $password
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    die("Koneksi gagal: " . $e->getMessage());
}
?>
