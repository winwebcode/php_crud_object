<?php

//ini_set('error_reporting', 0);
//ini_set('display_errors', 0);
session_start();

//SQL query

function queryMysql($query) {
    //database data
    $db_host='localhost';
    $db_name='cdrom';
    $db_login='root';
    $db_pass='vertrigo';
    $connect_mysql_base = new mysqli($db_host, $db_login, $db_pass, $db_name);
    $connect_mysql_base->set_charset("utf8");
    $result = $connect_mysql_base->query($query);

    if ($result == FALSE) {
        die($connect_mysql_base->error);
    }
    return $result;
}

//Safe SQL, delete suspicious symbols in query

function getSafePost($var) {
    global $connect_mysql_base;
    return $connect_mysql_base->real_escape_string($_POST[$var]);
}

function createTable($name, $query) {
    queryMysql("CREATE TABLE IF NOT EXISTS $name($query)");
    echo "Таблица '$name' создана или уже существовала ранее<br>";
}