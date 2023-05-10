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
  <meta charset="UTF-8">
  <title>Сайт знакомств</title>
</head>
<body>
  <h1>Добро пожаловать на сайт знакомств</h1>


      <h2>Управление сайтом</h2>
      <ul>
        <li><a href="view_users.php">Просмотреть пользователей</a></li>
        <li><a href="delete_user.php">Удалить пользователя</a></li>
        <li><a href="edit_site.php">Изменить сайт</a></li>
      </ul>
 

</body>
</html>
