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
    </head>
    <body>
        <h1>Регистрация</h1>
            <div>
                    <form action="registration_f.php" method="POST">
                        <label for="username">Логин:</label>
                        <input type="text" id="username" name="username" required><br>

                        <label for="password">Пароль:</label>
                        <input type="password" id="password" name="password" required><br>

                        <label for="first_name">Имя:</label>
                        <input type="text" id="first_name" name="first_name" required><br>

                        <label for="last_name">Фамилия:</label>
                        <input type="text" id="last_name" name="last_name" required><br>

                        <label for="inf">Информация:</label><br>
                        <textarea id="information" name="information" required></textarea><br>

                        <label for="email">email:</label>
                        <input type="text" id="email" name="email" required><br>

                        <input type="submit" value="Зарегистрироваться">
                    </form>
            </div>