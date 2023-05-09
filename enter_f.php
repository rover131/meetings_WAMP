
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kr";

$conn = mysqli_connect($servername, $username, $password, $dbname); // подключаемся к БД
$login = $_POST["login"];
$pass = $_POST["pass"];
$sql = "SELECT pass FROM users WHERE login = '$login'";


if (mysqli_query($conn, $sql)) {
// если запрос выполнен успешно, перенаправляем на страницу входа
header("Location: enter.php");
} else {
echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}


// Выполняем проверку логина и пароля
// if ($login === $validLogin && $password === $validPassword) {
//     // Авторизация успешна, сохраняем имя пользователя в сессии
//     $_SESSION['username'] = $username;
//     // Redirect на другую страницу, например на главную
//     header('Location: /index.php');
//     exit;
// }
session_start(); 
$_SESSION['id_ses'] = $login;
header('Location: http://localhost/kr/main.php');
exit;

?>
