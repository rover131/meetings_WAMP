<?php
session_start(); 
$_SESSION['id_ses'] = NULL; 
header('Location: http://localhost/kr/enter.php');
?>