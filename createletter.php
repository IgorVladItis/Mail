<?php
echo '<pre>';
var_dump($_FILES) ;
echo '</pre>';

session_start();
$from_users = $_SESSION['email'];
$user_id = $_SESSION['id'];

$to_users = filter_var(trim($_POST['to_users']),
    FILTER_SANITIZE_STRING);
$subject = filter_var($_POST['subject'],
    FILTER_SANITIZE_STRING);
$message = $_POST['message'];
//$message = filter_var($_POST['message'],
//    FILTER_SANITIZE_STRING);



$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$check_email = $mysql->query("SELECT `email` FROM `users` Where `email` = '$to_users'");
$row = $check_email->fetch_array(MYSQLI_ASSOC);
if(!isset($row['email'])){
    header('Location:/main.php?error_email='.$to_users);
}
else {
    $mysql->query("INSERT INTO `letters` (`user_id`, `from_users`, `to_users`, `subject`, `message`, `flag`)
    VALUES ($user_id, '$from_users', '$to_users', '$subject', '$message', 'in')");
    $result = $mysql->query("SELECT LAST_INSERT_ID() AS `last_id`");
    $row = $result->fetch_array(MYSQLI_ASSOC);
    $last_id = $row['last_id'];
//var_dump($row);

    $message_path = getcwd() . '\messages\\' . $last_id . '\\';
    if (!is_dir($message_path)) {
        mkdir($message_path);
    }
    file_put_contents($message_path,$message);
    $result = $mysql->query(" LAST_INSERT_ID() AS `last_id`");


    $file_path = getcwd() . '\files\\' . $last_id . '\\';
    if (!is_dir($file_path)) {
        mkdir($file_path);
    }

    $count = count($_FILES['files']['name']);
    $key = 0;
    while ($key < $count) {
        $uploadfile = $file_path . basename($_FILES['files']['name'][$key]);
        if (move_uploaded_file($_FILES['files']['tmp_name'][$key], $uploadfile)) {
            echo "Файл корректен и был успешно загружен.\n";

            $filename = $_FILES['files']['name'][$key];
            $size = $_FILES['files']['size'][$key];
            $mime_type = $_FILES['files']['type'][$key];
            $query = sprintf("INSERT INTO `files` (`letters_id`, `filename`, `size`, `mime_type`, `file_path`)
    VALUES ($last_id, '$filename', '$size', '$mime_type', '%s')", $mysql->real_escape_string($file_path));
            $mysql->query($query);

            var_dump($query);
            echo $mysql->error;
        } else {
            echo "Возможная атака с помощью файловой загрузки!\n";
        }
        $key++;
    }
    $mysql->close();
    header('Location:/main.php');

}

?>
