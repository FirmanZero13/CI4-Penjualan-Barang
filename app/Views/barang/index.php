<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mt-2">Daftar Barang</h1>
            <a href="/barang/create" class="btn btn-primary mb-3">Tambah Data Barang</a>
            <!-- Tambahkan blok kode ini untuk menampilkan pesan sukses -->
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
            
            <table class="table table-bordered table-striped">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($barang as $b) : ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $b['nama_barang']; ?></td>
                        <td>Rp <?= number_format($b['harga'], 0, ',', '.'); ?></td>
                        <td><?= $b['stok']; ?></td>
                        <td>
                            <a href="/barang/edit/<?= $b['id_barang']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Tombol Hapus menggunakan Form -->
                            <form action="/barang/delete/<?= $b['id_barang']; ?>" method="post" class="d-inline">
                                <!-- Keamanan tambahan agar form hanya bisa di-submit dari halaman ini -->
                                <?= csrf_field(); ?>
                                <!-- Mengubah method form dari POST menjadi DELETE sesuai standar RESTful -->
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?');">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>