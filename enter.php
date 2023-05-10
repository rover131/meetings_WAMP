
 <!DOCTYPE html>
 <html lang = "ru">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="register-form-container">
        <h1 class="form-title">Авторизация</h1><br>
        <form action="enter_f.php" method="POST">
            <div class="form-field">
                <label>Login</label>
                <input type="text" name="login" required>
            </div>

            <div class="form-field">
                <label>Password</label>
                <input type="password" name="pass" required>
            </div>
            
                <button class="button" type="submit"><b>Enter</b></button>
        </form>
            <br>Ещё нет аккаунта? <a href="registration.php">Зарегистрируйтесь</a> здесь!</br>
        </div>
    </body>
</html>

