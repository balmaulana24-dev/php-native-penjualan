
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
</head>
<body>

<h2>Edit Produk</h2>

<form action="<?= base_url('produk/update/'.$produk['kode_produk']) ?>" method="post">
    <?= csrf_field() ?>

    <p>Kode Produk</p>
    <input type="text" value="<?= esc($produk['kode_produk']) ?>" disabled>

    <p>Nama Produk</p>
    <input type="text" name="nama_produk"
           value="<?= esc($produk['nama_produk']) ?>" required>

    <p>Satuan</p>
    <input type="text" name="satuan"
           value="<?= esc($produk['satuan']) ?>" required>

    <p>Harga Jual</p>
    <input type="number" name="harga_jual"
           value="<?= esc($produk['harga_jual']) ?>" required>

    <p>Harga Beli</p>
    <input type="number" name="harga_beli"
           value="<?= esc($produk['harga_beli']) ?>" required>

    <p>Stok</p>
    <input type="number" name="stok"
           value="<?= esc($produk['stok']) ?>" required>

    <p>Deskripsi</p>
    <textarea name="deskripsi"><?= esc($produk['deskripsi'] ?? '') ?></textarea>

    <br><br>
    <button type="submit">Update</button>
    <a href="<?= base_url('produk') ?>">Kembali</a>
</form>

</body>
</html>
