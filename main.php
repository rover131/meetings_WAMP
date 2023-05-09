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
          <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "kr";
            session_start();
            if (isset($_SESSION['id_ses'])) { // получаем логин пользователя
              $login = $_SESSION['id_ses'];
            } else {
              $login = NULL;
            }
            $conn = mysqli_connect($servername, $username, $password, $dbname); // подключаемся к БД  
            $sql = "SELECT name, surname, info, email, pass FROM users WHERE login = '$login'";
            $res = mysqli_query($conn, $sql);
            $res = $res->fetch_assoc();
          ?> 


        
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" value="<?php echo $res['name']; ?>" required><br>

            <label for="surname">Фамилия:</label>
            <input type="text" id="surname" name="surname" value="<?php echo $res['surname']; ?>" required><br>

            <label for="info">info:</label>
            <input type="info" id="info" name="info" value="<?php echo $res['info']; ?>" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $res['email']; ?>" required><br>

            <label for="pass">Новый пароль:</label>
            <input type="pass" id="pass" name="pass"><br>

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