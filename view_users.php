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
$result = mysqli_query($connection, "SELECT * FROM users WHERE login NOT IN ('admin')");

// Выводим таблицу 
if ($result->num_rows > 0) {
    // Выводим данные в HTML таблицу
    echo "<table>";
    echo "<tr><th>id_user</th><th>login</th><th>name</th><th>surname</th><th>info</th></tr>";

    foreach($result as $row) {
      echo "<tr>";
      echo "<td>" . $row["id_user"] . "</td>";
      echo "<td>" . $row["login"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["surname"] . "</td>";
      echo "<td>" . $row["info"] . "</td>";
      
      echo "</tr>";
    }
  } else {
    echo "0 результатов";
  }
echo "</table>";

?>
