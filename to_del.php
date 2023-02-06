<?php
$id = $_GET['letter_to_del'];
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$check_email = $mysql->query("UPDATE `letters` SET `flag`='del' WHERE `id` = $id");
header('Location:/main.php');
?>