<?php
// Проверяем вошел ли пользователь и верная ли у него роль
  session_start(); 
  if ($_SESSION['id_ses'] == NULL || $_SESSION['id_role'] != 2){
    header('Location: http://localhost/kr/enter.php');
  } 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Сайт знакомств</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
      <header>
        <nav class="navigation">
          <a href="search.php">Поиск</a>
          <a href="likes.php">Симпатии</a>
          <a href="matches.php">Взаимность</a>
          <a href="about.php">О сайте</a>
          <a href="exit.php">Выход</a>
        </nav>
    </header>
    <div>
        <h2>Личная информация пользователя:</h2>
      <div class="user-info">
        <form method="post" action="edit_profile_f.php">
          <?php
            
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "kr";
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

            <label for="info">Информация о себе:</label><br>
            <textarea name="info" id="info" rows="5" cols="30"><?php echo $res['info']; ?></textarea><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $res['email']; ?>" required><br>

            <label for="pass">Новый пароль:</label>
            <input type="pass" id="pass" name="pass"><br>

            <input class=button type="submit" value="Сохранить изменения">
        </form>
      </div>
    </div>
  </body>
</html>