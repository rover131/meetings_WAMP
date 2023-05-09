<!DOCTYPE html>
<html>
  <head>
    <title>Название сайта</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="header">
        <h2>Добро пожаловать на сайт знакомств!</h2>
        <p>Здесь вы можете найти новых друзей, партнеров и душевных собеседников.</p>
      <div class="user-info">
        <form method="post" action="edit_profile_f.php">
            <!-- NOT EDIT!!!!!!!!!!!!!!!!!!!!!!!!!!!
            <label for="login">login:</label>
            <input type="text" id="login" name="login" value="<?php echo $user['login']; ?>" required><br>   -->

            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br>

            <label for="surname">Фамилия:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $user['surname']; ?>" required><br>

            <label for="info">info:</label>
            <input type="info" id="info" name="info" value="<?php echo $user['info']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>

            <label for="password">Новый пароль:</label>
            <input type="password" id="password" name="password"><br>

            <label for="confirm_password">Подтвердите новый пароль:</label>
            <input type="password" id="confirm_password" name="confirm_password"><br>

            <input type="submit" value="Сохранить изменения">
        </form>
      </div>
    </div>
    <div class="content">
      <div class="links">
        <ul>
          <li><a href="search.php">Поиск</a></li>
          <li><a href="likes.php">Симпатии</a></li>
          <li><a href="matches.php">Взаимность</a></li>
          <li><a href="about.php">О сайте</a></li>
          <li><a href="enter.php">Выход</a></li>
        </ul>
      </div>
    </div>
  </body>
</html>