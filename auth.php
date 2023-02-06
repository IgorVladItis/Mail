<?php
$pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),
        FILTER_SANITIZE_STRING);


$pass = md5($pass."jkhjkkasf23f4");

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    $result = $mysql->query("SELECT `email`, `id` FROM `users` Where `email` = '$email' and `pass` = '$pass'");
    $row = $result->fetch_array(MYSQLI_ASSOC);
//    var_dump($row);
    if (is_array($row)) {
//        if (count($row) == 1) {
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['id'] = $row['id'];
//            var_dump($_SESSION);
            header('Location:/main.php');
//        }
    }
    else {
        header('Location:/');
    }

$mysql->close();
?>