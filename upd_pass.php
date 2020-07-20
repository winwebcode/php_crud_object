<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
        <title>Change your password</title>
    </head>
<?php
require_once "mainController.php";
$user = (new User)->shortUserInfo();
?>
    
    <body>
    <div align="center">
        <form method="POST">
        <h3>Форма редактирования</h3>
        <input required type="password" name="old_password" value="" placeholder="Действующий пароль"><br>
        <input required type="password" name="new_password" value="" placeholder="Новый пароль"><br>
        <input type="submit" name="update_pass" value="Изменить данные"> 
        </form>
    </div>
    </body>
</html>
