<?php
session_start();
$email = $_SESSION['email'];

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$result = $mysql->query("SELECT * FROM `letters` Where `to_users` = '$email' And `flag` = 'in' ORDER BY `id` DESC LIMIT 50");
if($result != false){
$rows = $result->fetch_all(MYSQLI_ASSOC);
echo '<ul class="list-group list-group-flush">';
foreach ($rows as $row) {
    echo '<li class="list-group-item" ><a href="main.php?letter_id='.$row['id'].'"> '.$row['from_users'].' '.$row['subject'].'</a>|<a href="to_fav.php?letter_to_fav='.$row['id'].'">В избранные </a>|<a href="to_del.php?letter_to_del='.$row['id'].'">В удаленные</a> </li>';

}

echo '</ul>';
}
?>