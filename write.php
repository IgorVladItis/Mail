<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h1>Отправка сообщения </h1>
            <?php if(isset($_GET['error_email'])) {
                echo ' <div class="alert alert-danger" role="alert">';
                echo "Пользователь с почтой $_GET[error_email] не существует!";
                echo '</div>';
            }
            ?>
            <form action="createletter.php" enctype="multipart/form-data" method="post">
                <input type="text" class="form-control" name="to_users" value="<?php if(isset($_GET['email_to'])){echo $_GET['email_to'];} ?>" placeholder="Кому"><br>
                <input type="text" class="form-control" name="subject" placeholder="Тема"><br>
                <textarea name="message" id="editor" cols="30" rows="50"></textarea>
                <input type="file" multiple="multiple" name="files[]">
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>
    </div>
</div>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>