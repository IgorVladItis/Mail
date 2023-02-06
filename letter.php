<?php

session_start();
//var_dump($_SESSION);
$id = $_SESSION['id'];
if (isset($_GET['letter_id'])) {
    $letter = $_GET['letter_id'];
    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    $result = $mysql->query("SELECT * FROM `letters` Where `user_id` = $id and `id` = $letter");
    $rows = $result->fetch_array(MYSQLI_ASSOC);

    echo '<div class="is_letter">';
    echo $rows["message"];
    echo '</div>';

    $result = $mysql->query("SELECT * FROM `files` Where `letters_id` = $letter");
    $files = $result->fetch_all(MYSQLI_ASSOC);

    if (count($files) > 0) {
        $file_path = "files/$letter/";

        echo '<h2>Файлы</h2>';
        echo '<ul class="list-group">';
        foreach ($files as $file) {
            echo '<li class="list-group-item"><a href="' . $file_path . $file["filename"] . '"target = "_blank" download>' . $file["filename"] . '</a></li>';
        }
        echo '</ul>';
    }
}

else {
    echo "Не выбрано письмо для просмотра";
}
