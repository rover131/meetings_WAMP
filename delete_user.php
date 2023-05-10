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
session_start();
if (isset($_SESSION['id_ses'])) { 
    $login = $_SESSION['id_ses'];
} else {
    $login = NULL;
}

// Выполняем запрос к базе данных
$result = mysqli_query($connection, "SELECT * FROM users WHERE login NOT IN ('$login', 'admin')");

// Выводим таблицу с кнопками
echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["login"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["surname"] . "</td>";
    echo "<td>" . $row["info"] . "</td>";
    echo "<td><form method='post'><input type='hidden' name='user_id' value='" . $row["id_user"] . "'><button type='submit' name='delete_user'>Удалить</button></form></td>";
    echo "</tr>";
}
echo "</table>";

// Обрабатываем нажатие кнопки
if (isset($_POST["delete_user"])) {
    $user_id = $_POST["user_id"];
    mysqli_query($connection, "DELETE FROM users WHERE id_user='$user_id'");
    header("Location: delete_user.php");
}
?>
