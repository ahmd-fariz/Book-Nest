<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
     <div class="container mt-5">
        <h2>Tambah Peminjaman</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
                <a href="/index">Kembali ke Home</a>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="/peminjaman/store" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="user_id">User:</label>
                <select name="user_id" id="user_id" class="form-control">
                    <?php foreach ($users as $user): ?>
                        <option value="<?= $user['id'] ?>"><?= $user['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="buku_id">Buku:</label>
                <select name="buku_id" id="buku_id" class="form-control">
                    <?php foreach ($bukus as $buku): ?>
                        <option value="<?= $buku['id'] ?>"><?= $buku['judul'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="jumlah_buku">Jumlah Buku:</label>
                <input type="number" name="jumlah_buku" id="jumlah_buku" class="form-control">
            </div>

            <div class="form-group">
                <label for="tgl_pinjam">Tanggal Pinjam:</label>
                <input type="date" name="tgl_pinjam" id="tgl_pinjam" class="form-control">
            </div>

            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali:</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Tambah Peminjaman</button>
        </form>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
