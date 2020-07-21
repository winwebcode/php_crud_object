<html>
<title>Управление списком клиентов</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<body>

<?php
require_once "mainController.php";
?>

<div align="center">
 <form>
    <input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br><br>
 </form>
</div>

<?php
$user = (new User)->UserInfo();
require_once "footer.php";
