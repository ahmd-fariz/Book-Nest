<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Daftar Buku</h1>

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
</body>
</html>
