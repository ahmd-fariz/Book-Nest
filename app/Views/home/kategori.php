<?= $this->include('layouts/header') ?>
<?= $this->include('layouts/sidebar') ?>
<div class="container mt-5">
    <div class="content">
        <h2>Tambah Kategori</h2>
        <form action="/inputcontroller/storekategori" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="nama">Nama Kategori</label>
                <input type="text" name="kategori" placeholder="Masukan Nama Kategori Buku" class="form-control" id="nama">
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kategori</button>
        </form>
    </div>
</div>
<?= $this->include('layouts/footer') ?>
