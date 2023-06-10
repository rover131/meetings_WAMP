<!DOCTYPE html>
<html>
  <head>
    <title>Сайт знакомств</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
</html>

<?php
// Проверяем вошел ли админ и верная ли у него роль
  session_start(); 
  if ($_SESSION['id_ses'] == NULL || $_SESSION['id_role'] != 1){
    header('Location: http://localhost/kr/enter.php');
  } 
?>

<?php

// Устанавливаем соединение с базой данных
// подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kr";

$connection = mysqli_connect($servername, $username, $password, $dbname);

// Проверяем соединение на ошибки
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// получаем логин пользователя
if (isset($_SESSION['id_ses'])) { 
    $login = $_SESSION['id_ses'];
} else {
    $login = NULL;
}

// Выполняем запрос к базе данных
$result = mysqli_query($connection, "SELECT * FROM users WHERE login NOT IN ('$login', 'admin')");

// Выводим таблицу с кнопками
if ($result->num_rows > 0) {
    // Выводим данные в HTML таблицу
    echo "<table>";
    echo "<tr><th>id_user</th><th>login</th><th>name</th><th>surname</th><th>info</th></tr>";

    foreach($result as $row) {
      echo "<tr>";
      echo "<td><p class='tid'>" . $row["id_user"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["login"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["name"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["surname"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["info"] . "</td></p>";
      echo "<td>
      <form method='post'>
      <input type='hidden' name='id_user' value='" . $row["id_user"] . "'>
      <p class = 'button'><button type='submit' name='delete_user'>Delete</button></p>
      </form>
      </td>";
   
      echo "</tr>";
    }
  } else {
    echo "0 результатов";
  }
echo "</table>";

// Обрабатываем нажатие кнопки
if (isset($_POST["delete_user"])) {
    $id_user = $_POST["id_user"];
    mysqli_query($connection, "DELETE FROM users WHERE id_user='$id_user'");
    header("Location: delete_user.php");
}
echo "<a href=main_admin.php> Нажмите,</a> чтобы вернуться на главную страницу";
?>
