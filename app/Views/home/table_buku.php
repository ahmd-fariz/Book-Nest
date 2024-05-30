<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

    <div class="content">
        <h1 class="mt-5">Daftar Buku</h1>
        <table class="table  ">
            <thead>
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
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $buku): ?>
                    <tr>
                        <td><?= $buku['id'] ?></td>
                        <td><img src="../img/<?= $buku['sampul'] ?>" height="100" srcset=""></td>
                        <td><?= $buku['judul'] ?></td>
                    <td><?= isset($buku['penulis_nama']) ? $buku['penulis_nama'] : 'Tidak ada data' ?></td>
                        <td><?= isset($buku['penebit_nama']) ? $buku['penebit_nama'] : 'Tidak ada data' ?></td>
                        <td><?= $buku['tahun'] ?></td>
                        <td><?= $buku['jumlah'] ?></td>
                        <td><?= isset($buku['kategori_nama']) ? $buku['kategori_nama'] : 'Tidak ada data' ?></td>
                        <td><?= $buku['loker_buku'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?= $this->include('layouts/footer') ?>
