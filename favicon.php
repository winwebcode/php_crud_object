<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
<title>Upload favicon</title>
</head>
<?php
require_once "./mainController.php";
$user = (new User)->shortUserInfo();
?>
    <body>

        
        <div align="center">
         <form method='post' action='favicon.php' enctype='multipart/form-data'>
          Выберите ICO или PNG файл:<br>
          <input type='file' name='filename' value='browse' size='10'><br>
          <input type='submit' name='upload_favicon' value='Upload'><br>
        </form>
        </div><br><br>       
<?php
require_once "footer.php";
