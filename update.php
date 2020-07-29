<html>
<head>
    <meta charset="UTF-8" />
    <title>Редактирование</title>
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
<div align="center">

<?php
require_once "./Controllers/mainController.php";
$user = new User();
if ($user->shortUserInfo() == true) {

    /* update table*/
    // modify date
    if (!isset($_GET['id_klient'])) {} 
    else {
        $id = $_GET['id_klient'];  // приходит из getklientlist.php
        $s = queryMysql("SELECT * FROM klient WHERE (id_klient = '$id')");
        $f = $s->fetch_array();
    ?>
        <form method="GET">
        <h3>Форма редактирования</h3>
            <table border='1' width='40%' bgcolor='yellow'>
                <tr><td>ID клиента</td><td>Фамилия</td><td>Имя</td><td>Отчество</td><td>Дата рождения</td><td>Телефон</td></tr>
                <tr>
                    <td align="center"> <input type = "text" readonly name="id_klient" value="<?php echo $f['id_klient']; ?>"> </td>
                    <td align="center"> <input type="text" name="family" value="<?php echo $f['family']; ?>"> </td>
                    <td align="center"> <input type="text" name="name" value="<?php echo $f['name']; ?>"> </td>
                    <td align="center"> <input type="text" name="patronymic" value="<?php echo $f['patronymic']; ?>"> </td>
                    <td align="center"> <input type="text" name="birth_date" value="<?php echo $f['birth_date']; ?>"> </td>
                    <td align="center"> <input type="text" name="phone" value="<?php echo $f['phone']; ?>"> </td>
                </tr>
            </table>
            <br><input type="submit" name="change_data_client" value="Изменить данные"> 
        </form>
    </div>
    <?php
    }
}
require_once "footer.php";



