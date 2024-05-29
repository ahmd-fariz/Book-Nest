<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Edit Peminjaman</h1>

        <form action="/peminjamancontroller/update/<?= $peminjaman['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="user_id">User</label>
                <select name="user_id" id="user_id" class="form-control">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>" <?= $user['id'] == $peminjaman['user_id'] ? 'selected' : '' ?>>
                            <?= $user['nama'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="buku_id">Buku</label>
                <select name="buku_id" id="buku_id" class="form-control">
                    <?php foreach ($bukus as $buku): ?>
                        <option value="<?= $buku['id'] ?>" <?= $buku['id'] == $peminjaman['buku_id'] ? 'selected' : '' ?>>
                            <?= $buku['judul'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku</label>
                <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control" value="<?= $peminjaman['jumlah_buku'] ?>">
            </div>
            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control" value="<?= $peminjaman['tgl_pinjam'] ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="Dipinjam" <?= $peminjaman['status'] == 'Dipinjam' ? 'selected' : '' ?>>Dipinjam</option>
                    <option value="Kembali" <?= $peminjaman['status'] == 'Kembali' ? 'selected' : '' ?>>Kembali</option>
                </select>
            </div>
            <div class="form-group">
                <label for="denda">Denda</label>
                <input type="number" name="denda" id="denda" class="form-control" value="<?= $peminjaman['denda'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</body>
</html>
