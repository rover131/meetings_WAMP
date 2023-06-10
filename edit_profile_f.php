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
    
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $info = $_POST["info"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    if (isset($_SESSION['id_ses'])) {
        $login = $_SESSION['id_ses'];
    }
    else {
        $login = NULL;
    }
    }

    // добавляем соль к паролю и хешируем
    $salt = bin2hex(12); // случайная соль в виде 16-байтовой строки
    $hashed_password = hash('sha256', $pass . $salt);

    // формируем запрос на редактирование данных пользователя в БД
    $sql = "UPDATE users
            SET pass='$hashed_password',name='$name', surname='$surname', info='$info',email='$email' 
            WHERE login='$login'";

    if ($conn->query($sql) === TRUE) {
        echo "<b>Данные успешно обновлены!<p>";
        echo "<a href=main.php> Нажмите,</a> чтобы вернуться на главную страницу";
    } else {
        echo "Ошибка: " . $sql . "<br>" . $conn->error;
    }
    
    $conn->close();
 ?>



