<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>

<div class="container mt-5">
    <div class="content">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <h2>Tambah Buku</h2>
        <form action="/inputcontroller/store" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" class="form-control">
            </div>
            <div class="form-group">
                <label for="sinopsis">Sinopsis:</label>
                <input type="text" name="sinopsis" id="sinopsis" class="form-control">
            </div>
            <div class="form-group">
                <label for="penulis_id">Penulis:</label>
                <select name="penulis_id" id="penulis_id" class="form-control">
                    <?php foreach ($penulis as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="penerbit_id">Penerbit:</label>
                <select name="penerbit_id" id="penerbit_id" class="form-control">
                    <?php foreach ($penerbit as $p): ?>
                        <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun:</label>
                <input type="date" name="tahun" id="tahun" class="form-control">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control">
            </div>
            <div class="form-group">
                <label for="kategori_id">Kategori:</label>
                <select name="kategori_id" id="kategori_id" class="form-control">
                    <?php foreach ($kategori as $k): ?>
                        <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="loker_buku">Loker Buku:</label>
                <input type="text" name="loker_buku" id="loker_buku" class="form-control">
            </div>
            <div class="form-group">
                <label for="foto">Foto:</label>
                <input type="file" name="foto" id="foto" class="form-control-file">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Buku</button>
        </form>
    </div>
</div>

<?= $this->include('layouts/footer') ?>
