<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
</head>
<body>
    <form action="/inputcontroller/storekategori" method="post">
    <?= csrf_field() ?>
        <label for="nama">Nama Kategori</label>
        <input type="text" name="kategori" placeholder="Masukan Nama Kategori Buku">
        <br>
        <input type="submit" value="Tambah Kategori">
    </form>
</body>
</html>