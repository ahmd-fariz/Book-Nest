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
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>ID</th>
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
</body>
</html>
