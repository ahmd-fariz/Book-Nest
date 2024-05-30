<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="container mt-5">
    <div class="content">
        <h2>Edit Buku</h2>
        
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>
        <form action="/buku/update/<?= $buku['id'] ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?= $buku['judul'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <input type="text" name="sinopsis" id="sinopsis" value="<?= $buku['sinopsis'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="penulis_id">Penulis:</label>
                <select name="penulis_id" id="penulis_id" class="form-control">
                    <?php foreach ($penulis as $p): ?>
                        <option value="<?= $p['id'] ?>" <?= $p['id'] == $buku['penulis_id'] ? 'selected' : '' ?>><?= $p['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="penerbit_id">Penerbit:</label>
                <select name="penerbit_id" id="penerbit_id" class="form-control">
                    <?php foreach ($penerbit as $p): ?>
                        <option value="<?= $p['id'] ?>" <?= $p['id'] == $buku['penerbit_id'] ? 'selected' : '' ?>><?= $p['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="date" name="tahun" id="tahun" value="<?= $buku['tahun'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" value="<?= $buku['jumlah'] ?>" class="form-control">
            </div>

            <div class="form-group">
                <label for="kategori_id">Kategori:</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>" <?= $k['id'] == $buku['kategori_id'] ? 'selected' : '' ?>><?= $k['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="loker_buku">Loker Buku:</label>
                <input type="text" name="loker_buku" id="loker_buku" value="<?= $buku['loker_buku'] ?>" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
