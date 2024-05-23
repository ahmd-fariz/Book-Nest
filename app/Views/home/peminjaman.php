<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
</head>
<body>
    <h2>Tambah Peminjaman</h2>
    <form action="/peminjaman/store" method="post">
        <?= csrf_field() ?>
        
        <label for="user_id">User:</label>
        <select name="user_id" id="user_id">
            <?php foreach ($users as $user): ?>
                <option value="<?= $user['id'] ?>"><?= $user['nama'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="buku_id">Buku:</label>
        <select name="buku_id" id="buku_id">
            <?php foreach ($bukus as $buku): ?>
                <option value="<?= $buku['id'] ?>"><?= $buku['judul'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="jumlah_buku">Jumlah Buku:</label>
        <input type="number" name="jumlah_buku" id="jumlah_buku"><br>

        <label for="tgl_pinjam">Tanggal Pinjam:</label>
        <input type="date" name="tgl_pinjam" id="tgl_pinjam"><br>

        <label for="tgl_kembali">Tanggal Kembali:</label>
        <input type="date" name="tgl_kembali" id="tgl_kembali"><br>

        <input type="submit" value="Tambah Peminjaman">
    </form>
</body>
</html>
