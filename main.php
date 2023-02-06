<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</head>
<body>

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5 d-none d-sm-inline">Menu</span>
                </a>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" role="tablist" id="menu">
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link align-middle px-0" data-bs-toggle="tab" data-bs-target="#write_letters">
                            <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline">Написать письмо</span>
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link align-middle px-0" id="view_letter" data-bs-toggle="tab" data-bs-target="#view">
                            <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline">Посмотреть письмо</span>
                        </a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="nav-link px-0 align-middle" data-bs-toggle="tab" data-bs-target="#book">
                            <i class="fs-4"></i> <span class="ms-1 d-none d-sm-inline">Адресная книга</span></a>
                    </li>
                    <li class="w-100" role="presentation">
                        <a href="#" class="nav-link px-0" data-bs-toggle="tab" data-bs-target="#in_letters" > <span class="d-none d-sm-inline">Входящие</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="nav-link px-0" data-bs-toggle="tab" data-bs-target="#out_letters"> <span class="d-none d-sm-inline">Отправленные</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="nav-link px-0" data-bs-toggle="tab" data-bs-target="#fav_letters"> <span class="d-none d-sm-inline">Избранные</span></a>
                    </li>
                    <li role="presentation">
                        <a href="#" class="nav-link px-0" data-bs-toggle="tab" data-bs-target="#delete_letters"> <span class="d-none d-sm-inline">Удаленные</span></a>
                    </li>

                </ul>
                <hr>
                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start fixed-bottom" >
                    <li>
                        <a href="/logout.php" class="nav-link px-0 align-middle"> <span class="d-none d-sm-inline">Выйти</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col py-3">
            <div class="tab-pane fade" id="view" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                include 'letter.php';
                ?>
            </div>
            <div class="tab-pane fade show active" id="write_letters" role="tabpanel" aria-labelledby="home-tab">
                <?php
                include 'write.php';
                ?>
            </div>
            <div class="tab-pane fade" id="book" role="tabpanel" aria-labelledby="profile-tab">
                <?php
                include '1/book.php';
                ?>
            </div>
            <div class="tab-pane fade" id="in_letters" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    include '1/in_letters.php';
                ?>
            </div>
            <div class="tab-pane fade" id="out_letters" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    include '1/out_letters.php';
                ?>
            </div>
            <div class="tab-pane fade" id="fav_letters" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    include '1/fav_letters.php';
                ?>
            </div>
            <div class="tab-pane fade" id="delete_letters" role="tabpanel" aria-labelledby="contact-tab">
                <?php
                    include '1/del_letters.php';
                ?>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        if($('.is_letter').length>0){
            $('#view_letter').click();
        }
    });
</script>
</body>
</html>