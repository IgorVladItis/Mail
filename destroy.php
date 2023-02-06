<?php
$id = $_GET['letter_to_des'];
$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$check_email = $mysql->query("DELETE FROM `letters` WHERE `id` = $id");
$delete_files = $mysql->query("DELETE FROM `files` WHERE `letter_id` = $id");
header('Location:/main.php');
?>