<?php
$id = $_GET['letter_to_rest'];
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$check_email = $mysql->query("UPDATE `letters` SET `flag`='in' WHERE `id` = $id");
header('Location:/main.php');
?>