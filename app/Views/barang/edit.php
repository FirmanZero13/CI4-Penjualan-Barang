<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-8">
            <h2 class="my-3">Form Edit Data Barang</h2>
            <!-- Action form diarahkan ke rute update membawa ID barang -->
            <form action="/barang/update/<?= $barang['id_barang']; ?>" method="post">
                <div class="mb-3">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <!-- Tambahkan atribut value untuk menampilkan data lama -->
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?= $barang['nama_barang']; ?>" required autofocus>
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="<?= $barang['harga']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="stok" class="form-label">Stok</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="<?= $barang['stok']; ?>" required>
                </div>
                <button type="submit" class="btn btn-warning">Ubah Data</button>
                <a href="/barang" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>