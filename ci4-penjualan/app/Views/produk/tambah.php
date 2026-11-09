
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
</head>
<body>

<h2>Tambah Produk</h2>

<form action="<?= base_url('produk/simpan') ?>" method="post">
    <?= csrf_field() ?>

    <p>Kode Produk</p>
    <input type="text" name="kode_produk" required>

    <p>Nama Produk</p>
    <input type="text" name="nama_produk" required>

    <p>Satuan</p>
    <input type="text" name="satuan" required>

    <p>Harga Jual</p>
    <input type="number" name="harga_jual" required>

    <p>Harga Beli</p>
    <input type="number" name="harga_beli" required>

    <p>Stok</p>
    <input type="number" name="stok" required>

    <p>Deskripsi</p>
    <textarea name="deskripsi"></textarea>

    <br><br>
    <button type="submit">Simpan</button>
    <a href="<?= base_url('produk') ?>">Kembali</a>
</form>

</body>
</html>
