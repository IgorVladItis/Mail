<?php
session_start();
//var_dump($_SESSION);
$id = $_SESSION['id'];

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$result = $mysql->query("SELECT * FROM `letters` Where `user_id` = $id ORDER BY `id` DESC LIMIT 50");
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo '<ul class="list-group list-group-flush">';

 foreach ($rows as $row){
     echo '<li class="list-group-item" ><a href="main.php?letter_id='.$row['id'].'"> '.$row['to_users'].' '.$row['subject'].'</a> </li>';

 }
 echo '</ul>';
?>