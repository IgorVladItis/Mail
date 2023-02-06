<?php
session_start();
if(isset($_SESSION['email'])){
    header('Location:/main.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма Регистрации</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Форма Регистрации</h1>
            <form action="check.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
                <input type="text" class="form-control" name="name" placeholder="Введите имя"><br>
                <input type="password" class="form-control" name="pass" placeholder="Введите пароль"><br>
                <button class="btn btn-success" type="submit">Зарегистрировать</button>
            </form>
        </div>
        <div class="col">
            <h1>Форма Авторизации</h1>
            <form action="auth.php" method="post">
                <input type="text" class="form-control" name="email" placeholder="Введите почту"><br>
                <input type="password" class="form-control" name="pass" placeholder="Введите пароль"><br>
                <button class="btn btn-success" type="submit">Авторизироваться</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>