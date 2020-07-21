<?php
require_once "mainController.php";
$user = (new User)->shortUserInfo();
?>

<html>
<head>
	<title>Добавить клиента</title>
	<meta charset="UTF-8" />
	<link rel="stylesheet" type="text/css" href="styles/style.css">
        <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>


<body>
<div align="center">
	<form method="POST">
	<h3>Форма добавления клиента</h3>
        <input required class="button" type="text" value="" size="30" name="family" placeholder="Фамилия" ><br><br>
		<input required class="button" type="text" value="" size="30" name="name" placeholder="Имя" ><br><br>
		<input required class="button" type="text" value="" size="30" name="patronymic" placeholder="Отчество" ><br><br>
		<input required class="button" type="text" value="" size="30" name="birth_date" placeholder="Дата рождения" ><br><br>
                <input required class="button" type="text" value="" size="30" minlength="11" maxlength="11" name="phone" placeholder="Телефон в формате 89109355050" ><br><br>
		<input class="button" type="text" value="" size="30" name="deposit" placeholder="Депозит. Данное поле пока не передаёт данные" placeholder="" ><br><br>
		<input class="button" type="submit" name="add_client"  value="Добавить клиента" > <br>
		<input class="button" type="reset"  value="Очистить поля" > <br>
		<input class="button" type="button" value="На главную" onclick= "document.location='index.php'"><br>
	</form>
</div>

<?php
require_once "footer.php";

