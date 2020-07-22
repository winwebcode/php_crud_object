<html>
<head>
	<title>Список пользователей</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>


<?php
require_once "./mainController.php";
$user = new User();
$user->shortUserInfo();
if ($user->checkAdmin() == true) {
?>


<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
    <input class="menu" type="button" value="На главную" onclick= "document.location='index.php'"><br>
    <input class="menu" type="button" value="Обновить favicon" onclick="document.location='favicon.php'"><br>
    <input class="menu" type="button" onclick="document.location='add_admin.php'" value="Добавить администратора"><br>
    

</form> 
</div><br><br><br><br><br>
<!--/Menu-->
<?php
} else {header('Location: 404.php');}
require_once "footer.php";
