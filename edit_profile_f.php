<?php
// Подключение к базе данных
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
    $pass = $_POST["password"];
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $info = $_POST["info"];
    $email = $_POST["email"];
    session_start();
    if (isset($_SESSION['id_ses'])) {
        $login = $_SESSION['id_ses'];
    // использовать имя пользователя, например, вывести его на страницу
    }
    else {
        $login = NULL;
    }
    }

    // добавляем соль к паролю и хешируем
    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

    // формируем запрос на добавление пользователя в БД
    $sql = "UPDATE users
            SET pass='$hashed_password',name='$name', surname='$surname', info='$info',email='$email' 
            WHERE login='$login'";

    if ($conn->query($sql) === TRUE) {
        echo "Данные успешно обновлены";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
 ?>



