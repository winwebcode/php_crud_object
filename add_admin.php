<?php
require_once "mainController.php";
$user = new User();
$user->shortUserInfo();
if ($user->checkAdmin() == true) {
?>
<html>
<head>
	<title>Добавить клиента</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>

<div align="center">
	<form method="POST">
            <input required class="button" minlength="4" type="text" size="30" name="reg_login" placeholder="Логин не менее 4 символов"><br><br>
            <input required class="button" minlength="6" type="text" size="30" name="reg_password" placeholder="Пароль не менее 6 символов"><br><br>
            <input class="button" type="submit" name="signup_admin"  value="Добавить Админа"> <br>
            <input class="button" type="button" value="На главную" onclick="document.location='index.php'"><br>
	</form>
</div>

<?php
}
else {header('Location: 404.php');}
require_once "footer.php";
