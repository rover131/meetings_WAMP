<!DOCTYPE html>
<html>
  <head>
    <title>Сайт знакомств</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
  </head>
</html>
<?php
// Проверяем вошел ли пользователь и верная ли у него роль
  session_start(); 
  if ($_SESSION['id_ses'] == NULL || $_SESSION['id_role'] != 2){
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

// Формируем SQL запрос для получения данных из таблицы
$sql = "SELECT * FROM users WHERE login NOT IN ('$login', 'admin') 
        AND id_user IN (SELECT who FROM sympathy 
        WHERE whom = (SELECT id_user FROM users WHERE login = '$login'))
        AND id_user IN (SELECT whom FROM sympathy 
        WHERE who = (SELECT id_user FROM users WHERE login = '$login')) ";

// Выполняем запрос
$result = mysqli_query($connection, $sql);


if ($result->num_rows > 0) {
    // Выводим данные в HTML таблицу
    echo "<table>";
    echo "<tr><th>login</th><th>name</th><th>surname</th><th>info</th><th>email для связи</th></tr>";

    foreach($result as $row) {
      echo "<tr>";
      echo "<td><p class='tid'>" . $row["login"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["name"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["surname"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["info"] . "</td></p>";
      echo "<td><p class='tid'>" . $row["email"] . "</td></p>";
      echo "</tr>";
    }
  } else {
    echo "0 результатов";
  }
echo "</table><br>";


echo "<a href=main.php> Нажмите,</a> чтобы вернуться на главную страницу";
// Закрываем соединение с базой данных
mysqli_close($connection);

?>