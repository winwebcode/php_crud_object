<html>
<head>
	<title>Список пользователей</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>


<?php
require_once "mainController.php";
$user = new User();
$user->shortUserInfo();
?>


<!--Menu-->
<div align="center">
<h3>Меню </h3>
<form class="menu">
    <input class="menu" type="button" onclick="document.location='index.php'" value="На главную"><br>
</form> 
</div>
<!--/Menu-->

<?php
$user->getMembersList();
require_once "footer.php";
