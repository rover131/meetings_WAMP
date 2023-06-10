<?php
// Проверяем вошел ли админ и верная ли у него роль
  session_start(); 
  if ($_SESSION['id_ses'] == NULL || $_SESSION['id_role'] != 1){
    header('Location: http://localhost/kr/enter.php');
  } 
?>

<!DOCTYPE html>
<html>
<head>
  <title>Сайт знакомств</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Добро пожаловать на сайт знакомств</h1>


        <h2>Управление сайтом:<br>
        <a href="view_users.php">Просмотреть пользователей</a><br>
        <a href="delete_user.php">Удалить пользователя</a><br>
        <a href="exit.php">Выход</a></h2>
 

</body>
</html>
