<html>
<title>Управление списком клиентов</title>
<meta charset="UTF-8" />
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<body>

<?php
require_once "./Controllers/mainController.php";
$user = new User();
if ($user->shortUserInfo() == true) {
    ?>

    <div align="center">
     <form method="POST" action="getklientlist.php">
         <input class="button" type="button" onclick="document.location='addorder.php'" value="Добавить клиента"><br>
            <input class="button" type="button" onclick="document.location='search.php'" value="Поиск клиента"><br>
            <input class="button" type="submit" name="clear_bd" value="Удалить ID > 30"><br><br>
            <input class="button" type="text" value="Введите ID" name="nomerID" onfocus="value=''"><br><br>
            <input class="button" type="submit"  value="Удалить клиента" > <br>
            <input class="button" type="reset"  value="Очистить поля" ><br>
            <input class="button" type="button" value="На главную" onclick= "document.location='start.php'"><br><br>
     </form>
    </div>


    <?php

$client = (new Client)->newGetClientList(); //PDO

}
require_once "footer.php";
