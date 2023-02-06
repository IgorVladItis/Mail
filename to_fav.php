<?php
$id = $_GET['letter_to_fav'];
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$check_email = $mysql->query("UPDATE `letters` SET `flag`='fav' WHERE `id` = $id");
header('Location:/main.php');
?>