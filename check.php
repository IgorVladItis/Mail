<?php
    
    $name = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['login']),
        FILTER_SANITIZE_STRING).'@mymail';

    if(mb_strlen($login) < 4) {
        echo"Недопустимая длина логина";
        exit();
    } elseif (mb_strlen($name) < 4 || (mb_strlen($name) > 20)) {
        echo "Недопустимая длина имени";
        exit();
    }  elseif (mb_strlen($pass) < 3 || (mb_strlen($pass) > 30)) {
        echo "Недопустимая длина пароля";
        exit();
    }

    $pass = md5($pass."jkhjkkasf23f4");

    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    var_dump(
    $mysql->query("INSERT INTO `users` (`login`, `pass`, `name`, `email`) 
    VALUES ('$login', '$pass', '$name', '$email')"));

    $mysql->close();

   header('Location:/');


?>