<html>
<title>Управление списком клиентов</title>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<body>

<?php
require_once "./Controllers/mainController.php";
$user = new User();
if ($user->checkAuth() == true) {
$user->userInfo();
?>

<div align="center">
 <form>
    <input class="button" type="button" value="На главную" onclick= "document.location='start.php'"><br><br>
 </form>
</div>

<?php
}
require_once "footer.php";
