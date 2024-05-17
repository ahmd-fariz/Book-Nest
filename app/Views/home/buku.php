<!DOCTYPE html>
<html>
<head>
    <title>Tambah Buku</title>
</head>
<body>
    <h2>Tambah Buku</h2>
    <form action="/inputcontroller/store" method="post">
        <?= csrf_field() ?>
        <label for="judul">Judul:</label>
        <input type="text" name="judul" id="judul"><br>

        <label for="penulis_id">Penulis:</label>
        <select name="penulis_id" id="penulis_id">
            <?php foreach ($penulis as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="penerbit_id">Penerbit:</label>
        <select name="penerbit_id" id="penerbit_id">
            <?php foreach ($penerbit as $p): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="tahun">Tahun:</label>
        <input type="date" name="tahun" id="tahun"><br>

        <label for="jumlah">Jumlah:</label>
        <input type="number" name="jumlah" id="jumlah"><br>

        <label for="kategori_id">Kategori:</label>
        <select name="kategori_id" id="kategori_id">
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="loker_buku">Loker Buku:</label>
        <input type="text" name="loker_buku" id="loker_buku"><br>

        <input type="submit" value="Tambah Buku">
    </form>
</body>
</html>
