<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="/authcontroller/register" method="post">
                <?= csrf_field(); ?>
                <h1>Create Account</h1>
                <?php if (session()->getFlashdata('success')) : ?>
                    <div><?= session()->getFlashdata('success') ?></div>
                <?php endif; ?>
                <?php if (isset($validation)) : ?>
                    <div><?= $validation->listErrors() ?></div>
                <?php endif; ?>
                <div>
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="<?= old('name') ?>">
                </div>
                <div>
                    <label for="gender">Gender</label>
                    <select name="gender" id="gender">
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label for="name">Telp</label>
                    <input type="text" name="telp" id="telp" value="<?= old('telp') ?>">
                </div>
                <div>
                    <label for="name">Alamat</label>
                    <input type="text" name="alamat" id="alamat" value="<?= old('alamat') ?>">
                </div>
                <div>
                    <label for="role">Role</label>
                    <select name="role" id="role">
                        <option value="Petugas">Petugas</option>
                        <option value="Anggota">Anggota</option>
                    </select>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" value="<?= old('email') ?>">
                </div>
                <div>
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="<?= old('username') ?>">
                </div>
                <div>
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>
                <button type="submit">Register</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="/authcontroller/login" method="post">
                <?= csrf_field(); ?>
                <h1 class="si">Sign In</h1>
                <?php if (isset($error) && is_array($error)) : ?>
                    <div>
                        <?php foreach ($error as $err) : ?>
                            <div><?= esc($err) ?></div>
                        <?php endforeach; ?>
                    </div>
                <?php elseif (isset($error)) : ?>
                    <div><?= esc($error) ?></div>
                <?php endif; ?>
                <input type="text" placeholder="Username" name="username" autofocus>
                <input type="password" placeholder="Password" name="password">
                <button href="" type="submit" name="btn">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details</p>
                    <a class="hidden" id="login" href="#">Sign In</a>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Register with your personal details</p>
                    <a class="hidden" id="register" href="#">Sign Up</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script.js"></script>
</body>

</html>