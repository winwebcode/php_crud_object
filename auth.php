<html>
<head>
<title>Авторизация</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<script src="styles/script.js" type="text/javascript"></script>
</head>
<?php
require_once "./Controllers/mainController.php";
?>
<body>
	<div class="blocker" align="center">  
		<br><br>
		<form method="POST">  <!-- обработчик авторизации-->
                    <input required class="auth" name="login" value="" type="text" size="20" maxlength="20" placeholder="Логин"><br>
                    <span class="password">
                    <input required class="auth" id="password-input" name="password" value="" type="password" size="20" maxlength="20" placeholder="Пароль"><br>
                    <a href="#" class="password-control" onclick="return show_hide_password(this);"></a> </span>
                    <input class="auth" type="submit" name="autharization" value="Войти"><br>
                    <a  href="reg.php">Регистрация</a><br>
                    <a  href="blog/">Читать блог</a><br>
		</form>
	</div>
<?php
require_once "footer.php";
