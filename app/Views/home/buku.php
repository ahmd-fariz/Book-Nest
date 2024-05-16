<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Input Data Buku</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <form action="<?php echo base_url('inputController/submit');?>" method="post"> <!-- Ubah action sesuai dengan rute yang Anda tentukan -->
                <div>
                    <input type="text" name="judul" placeholder="judul"><br><br>
                    <input type="text" name="tahun" placeholder="tahun"><br><br>
                    <input type="text" name="jumlah" placeholder="jumlah"><br><br>
                    <label for="loker">Pilih loker</label>
                    <select name="loker" id="loker">
                        <option value="1">Loker 1</option>
                        <option value="2">Loker 2</option>
                        <option value="3">Loker 3</option>
                    </select>
                </div>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
