<html>
<head>
	<title>База данных</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<?php
require_once "./mainController.php";
$user = new User();
if ($user->shortUserInfo() == true) {
    ?>
    <body>
    <!--Menu-->
    <div align="center">
    <h3>Меню </h3>
    <form class="menu">
        <input class="menu" type="button" onclick="document.location='index.php'" value="На главную"><br>
        <input class="menu" type="button" onclick="document.location='getklientlist.php'" value="Управление клиентами( список клиентов / удаление)"><br>
        <input class="menu" type="button" onclick="document.location='usd_parse.php'" value="Парсер валют"><br>

        <?php  if ($user->checkAdmin() == true) {
            ?>
            <input class="menu" type="button" onclick="document.location='settings.php'" value="Настройки сайта"><br>
            <input class="menu" type="button" onclick="document.location='members.php'" value="Список пользователей"><br>
            <?php
        }
        ?>

    </form>
    </div>
    <br><br><br><br><br><br><br><br><br>
    <!--/Menu-->


    <?php
}
require_once "footer.php";

