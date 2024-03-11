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
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <input type="password" placeholder="Verify your password">
                <a href="#">Sign Up</a>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="">
                <h1 class="si">Sign In</h1>
                <input type="text" placeholder="Username">
                <input type="password" placeholder="Password">
                <a href="#">Sign In</a>
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