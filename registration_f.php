<?php
// подключаемся к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kr";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// проверяем соединение
if (!$conn) {
    die("Ошибка соединения: " . mysqli_connect_error());
}

// обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // получаем данные из формы
    $login = $_POST["username"];
    $pass = $_POST["password"];
    $name = $_POST["first_name"];
    $surname = $_POST["last_name"];
    $info = $_POST["information"];
    $email = $_POST["e-mail"];

    // добавляем соль к паролю и хешируем
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // формируем запрос на добавление пользователя в БД
    $sql = "INSERT INTO users (login, pass, name, surname, info, email)
            VALUES ('$login', '$hashed_password', '$name', '$surname', '$info', '$email')";

    if (mysqli_query($conn, $sql)) {
        // если запрос выполнен успешно, перенаправляем на страницу входа
        header("Location: enter.php");
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// закрываем соединение с БД
mysqli_close($conn);
?>