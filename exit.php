<?php
session_start(); 
$_SESSION['id_ses'] = NULL; 
$_SESSION['id_role'] = NULL; 
header('Location: http://localhost/kr/enter.php');
?>