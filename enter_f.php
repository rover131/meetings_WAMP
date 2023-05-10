
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "kr";

$conn = mysqli_connect($servername, $username, $password, $dbname); // подключаемся к БД
$login = $_POST["login"];
$pass = $_POST["pass"];
$sql = "SELECT pass, id_role FROM users WHERE login = '$login'";
$sql = mysqli_query($conn, $sql);


if ($sql) {
    $sql = $sql->fetch_assoc();
    $pass_sql = $sql['pass'];  //хэшированный пароль из БД
    $salt = bin2hex(12); // соль
    $hashed_pass_sql = hash('sha256', $pass . $salt); // хешируем введенный пароль
    if ($hashed_pass_sql == $pass_sql){ // если пароли совпали
        session_start(); 
        $role_sql = $sql['id_role'];  // id роли из БД
        $_SESSION['id_ses'] = $login;  // сохраняем сессию
        $_SESSION['id_role'] = $role_sql;  // сохраняем роль
        if($role_sql == 1){
            header('Location: http://localhost/kr/main_admin.php');
        } else {
            header('Location: http://localhost/kr/main.php');
        }
        
    } else {
        header('Location: http://localhost/kr/enter.php');
        }

} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }

?> 
