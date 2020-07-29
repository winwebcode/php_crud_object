<html>
<head>
    <title>Поиск клиентов</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
<?php
require_once "./Controllers/mainController.php";
$user = new User();
if ($user->shortUserInfo() == true) {
    ?>

    <div align="center">
            <form method="GET" action="search.php">
                    <input required class="button"  type="text" placeholder="Введите Фамилию" name="poisk"> <br><br> 
                    <input class="button" type="submit"  value="Поиск" > <br>
                    <input class="button" type="button" value="На главную" onclick= "document.location='start.php'"><br>	
            </form>
    </div>

    <?php
}
require_once "footer.php";
?>

