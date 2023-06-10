 <!DOCTYPE html>
 <html lang = "ru">
    <head>
        <meta charset="UTF-8">
        <title>Регистрация</title>
        <link rel="stylesheet" href="style.css">
        <style>
            .content {
                max-width: 500px;
                margin: 0 auto;
                text-align: center;
            }
        </style>
        <script src="script.js"></script>
    </head>
    <body>
    <div class="register-form-container">
        <h1 class="form-title">Регистрация</h1><br>
            <div>
                    <form action="registration_f.php" method="POST">
                    <div class="form-field">
                        <label for="username">Логин:</label>
                        <input type="text" id="username" name="username" required><br>
                    </div>
                    <div class="form-field">
                        <label for="password">Пароль:</label>
                        <input type="password" id="password" name="password" required><br>
                    </div>
                    <div class="form-field">
                        <label for="first_name">Имя:</label>
                        <input type="text" id="first_name" name="first_name" required><br>
                    </div>
                    <div class="form-field">
                        <label for="last_name">Фамилия:</label>
                        <input type="text" id="last_name" name="last_name" required><br>
                    </div>
                    <div class="form-field">
                        <label for="inf">Информация:</label><br>
                        <textarea id="information" name="information" required></textarea><br>
                    </div>
                    <div class="form-field">
                        <label for="email">email:</label>
                        <input type="text" id="email" name="email" required><br>
                </div>
                        <button class="button" input type="submit">Зарегистрироваться</button>
                    </form>
            </div>
        </div>
    </body>
