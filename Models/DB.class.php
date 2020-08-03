<?php
//ini_set('error_reporting', 0);
//ini_set('display_errors', 0);
session_start();

Class DB
{
    /** @var \PDO */
    private $pdo;

    public function __construct()
    {
        //$dbOptions = (require 'settings.php')['db'];
        /*$dbOptions = new PDO(
            'mysql:host=localhost;dbname=cdrom',
            'root',
            'vertrigo'
        );*/
        $user = 'root';
        $pass = 'vertrigo';

        //$this->pdo = new \PDO(
        $this->pdo = new PDO('mysql:host=localhost;dbname=cdrom', $user, $pass);
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll();
    }


}

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