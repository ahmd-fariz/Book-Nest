<!DOCTYPE html>
<html>
<head>
    <title>Pengembalian Buku</title>
</head>
<body>
    <h2>Pengembalian Buku</h2>
    <form action="/peminjaman/return" method="post">
        <?= csrf_field() ?>
        
        <label for="peminjaman_id">Pilih Peminjaman:</label>
        <select name="peminjaman_id" id="peminjaman_id">
            <?php foreach ($peminjamans as $peminjaman): ?>
                <option value="<?= $peminjaman['id'] ?>">
                    <?= $peminjaman['judul_buku'] ?> - <?= $peminjaman['nama_user'] ?> (<?= $peminjaman['tgl_pinjam'] ?>)
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="tgl_kembali">Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali"><br>

        <input type="submit" value="Kembalikan Buku">
    </form>
</body>
</html>
