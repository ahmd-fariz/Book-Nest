<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="container mt-5">
    <div class="content">
        <h1 class="mb-4">Daftar Buku</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Sampul</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Kategori</th>
                    <th>Loker Buku</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $buku): ?>
                    <tr>
                        <td><?= $buku['id'] ?></td>
                        <td><img src="../img/<?= $buku['sampul'] ?>" height="100" alt="Sampul Buku"></td>
                        <td><?= $buku['judul'] ?></td>
                        <td><?= isset($buku['penulis_nama']) ? $buku['penulis_nama'] : 'Tidak ada data' ?></td>
                        <td><?= isset($buku['penebit_nama']) ? $buku['penebit_nama'] : 'Tidak ada data' ?></td>
                        <td><?= $buku['tahun'] ?></td>
                        <td><?= $buku['jumlah'] ?></td>
                        <td><?= isset($buku['kategori_nama']) ? $buku['kategori_nama'] : 'Tidak ada data' ?></td>
                        <td><?= $buku['loker_buku'] ?></td>
                        <td>
                            <a href="/buku/edit/<?= $buku['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/buku/delete/<?= $buku['id'] ?>" method="post" style="display:inline;">
                                <?= csrf_field() ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
