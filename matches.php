<?php
// Проверяем вошел ли пользователь
  session_start(); 
  if ($_SESSION['id_ses'] == NULL){
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
    echo "<tr><th>id_user</th><th>login</th><th>name</th><th>surname</th><th>info</th><th>email для связи</th></tr>";

    foreach($result as $row) {
      echo "<tr>";
      echo "<td>" . $row["id_user"] . "</td>";
      echo "<td>" . $row["login"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["surname"] . "</td>";
      echo "<td>" . $row["info"] . "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "0 результатов";
  }
echo "</table>";


echo "<a href=main.php> Нажмите,</a> чтобы вернуться на главную страницу";
// Закрываем соединение с базой данных
mysqli_close($connection);

?>