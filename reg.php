<?php
require_once "./Controllers/mainController.php";
?>
<html>
<head>
	<title>Регистрация</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
 <script src="styles/script.js" type="text/javascript"></script>
<div align="center">
    <form method="POST">
        <input required class="button" type="text" value="" size="30" name="reg_login" minlength="4" placeholder="Login от 4 символов"><br><br>
                <span class="password"><input required class="button" type="password" value="" id="password-input" size="30" name="reg_password" placeholder="Пароль от 6 символов" minlength="6" onfocus="value=''"><br><br>
                <a href="#" class="password-control" onclick="return show_hide_password(this);"></a> </span>
		<input class="button" type="submit" name="signup"  value="Регистрация"> <br>
		<input class="button" type="button" value="На главную" onclick="document.location='start.php'"><br>
	</form>
</div>



<?php
require_once "footer.php";
