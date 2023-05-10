
 <!DOCTYPE html>
 <html lang = "ru">
    <head>
        <meta charset="UTF-8">
        <title>Авторизация</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .content {
                max-width: 500px;
                margin: 0 auto;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <h1>Авторизация</h1>
            <div>
                <form action="enter_f.php" method="POST">
                        <label>Login</label>
                        <input type="text" name="login" required><p>
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="pass" required>
                    </div>
                    <p>
                    <button type="submit"><b>Enter</b></button>
                </form>
                </form>
            </div>
            <p>Ещё нет аккаунта? <a href="registration.php">Зарегистрируйтесь</a> здесь!</p>
