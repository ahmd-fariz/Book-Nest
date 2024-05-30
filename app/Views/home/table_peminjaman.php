<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>
    <div class="content">
        <h1 class="mt-5">Daftar Peminjaman</h1>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <table class="table ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Buku</th>
                    <th>Jumlah Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Batas Waktu</th>
                    <th>Status</th>
                    <th>Denda</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($data as $p): ?>
                    <tr>
                        <td><?= $p['id'] ?></td>
                        <td><?= isset($p['user_nama']) ? $p['user_nama'] : 'Tidak ada data' ?></td>
                        <td><?= isset($p['buku_nama']) ? $p['buku_nama'] : 'Tidak ada data' ?></td>
                        <td><?= $p['jumlah_buku'] ?></td>
                        <td><?= $p['tgl_pinjam'] ?></td>
                        <td><?= $p['tgl_kembali'] ?></td>
                        <td><?= $p['batas_waktu'] ?></td>
                        <td><?= $p['status'] ?></td>
                        <td><?= $p['denda'] ?></td>
                        <td>
                            <a href="/peminjaman/edit/<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="/peminjaman/delete/<?= $p['id'] ?>" method="post" style="display:inline;">
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

    <?= $this->include('layouts/footer') ?>
