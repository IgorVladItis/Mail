<?php
session_start();

$id = $_SESSION['id'];

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$result = $mysql->query("SELECT * FROM `users` Where `id` <> $id");
$users = $result->fetch_all(MYSQLI_ASSOC);


    echo '<h2>Адресная книга</h2>';
    echo '<ul class="list-group">';
    foreach ($users as $user) {
        echo '<li class="list-group-item" >'.$user['login'].'<a href="main.php?email_to='.$user['email'].'"> '.$user['email'].'</a> </li>';

}
echo '</ul>';
