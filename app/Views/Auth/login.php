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
            <form action="">
                <h1>Create Account</h1>
                <input type="text" placeholder="Name">
                <label for="gender"></label>
                <div class="select-container">
                    <select name="gender" id="gender">
                        <option value="">Jenis Kelamin</option>
                        <option value="male">Laki-laki</option>
                        <option value="female">Perempuan</option>
                    </select>
                    <img src="img/caret-down.png">
                </div>
                <input type="text" placeholder="No Telp">
                <input type="text" placeholder="Petugas / Anggota">
                <input type="email" placeholder="Your Email">
                <input type="text" placeholder="Your Username ">
                <input type="password" placeholder="Your password">
                <a href="#">Sign Up</a>
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