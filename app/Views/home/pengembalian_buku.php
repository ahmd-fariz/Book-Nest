<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Pengembalian Buku</h2>
        <form action="/peminjaman/return" method="post">
            <?= csrf_field() ?>
            
            <div class="form-group">
                <label for="peminjaman_id">Pilih Peminjaman:</label>
                <select name="peminjaman_id" id="peminjaman_id" class="form-control">
                    <?php foreach ($peminjamans as $peminjaman): ?>
                        <option value="<?= $peminjaman['id'] ?>">
                            <?= $peminjaman['judul_buku'] ?> - <?= $peminjaman['nama_user'] ?> (<?= $peminjaman['tgl_pinjam'] ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tgl_kembali">Tanggal Kembali:</label>
                <input type="date" name="tgl_kembali" id="tgl_kembali" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Kembalikan Buku</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
