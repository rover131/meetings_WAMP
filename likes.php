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
        AND id_user NOT IN (SELECT whom FROM sympathy 
        WHERE who = (SELECT id_user FROM users WHERE login = '$login')) ";

// Выполняем запрос
$result = mysqli_query($connection, $sql);


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
      echo "<td><form method='post'><input type='hidden' name='id_user' value='" . $row["id_user"] . "'><button type='submit' name='like_user'>Like</button></form></td>";
   
      echo "</tr>";
    }
  } else {
    echo "0 результатов";
  }
echo "</table>";

// Обрабатываем нажатие кнопки
if (isset($_POST["like_user"])) {
    $id_user = $_POST["id_user"];
    mysqli_query($connection, "INSERT sympathy(who, whom) VALUES ((SELECT id_user FROM users WHERE login = '$login'), $id_user)");
    header("Location: likes.php");
}
echo "<a href=main.php> Нажмите,</a> чтобы вернуться на главную страницу";
// Закрываем соединение с базой данных
mysqli_close($connection);

?>