<?php
/*Class User - Autharization, change password, check autharization,
 * ban and unban, list of members, save user,
 *  sign out, info about current user*/

Class User
{
    //свойства
    private $login;
    private $password;
    private $role;
    private $current_user;
    private $user_id;
    private $client_ip;
    
    //методы
    public function getLogin(): string
    {
        return $this->login;
    }
    
    public function getPassword(): string
    {
        return $this->password;
    }
    
    public function getRole(): string
    {
        return $this->role;
    }
    
    public function safeCheckLogPass()
    {
        if (isset($_POST['reg_login']) and isset($_POST['reg_password'])) {
            $this->login = $_POST['reg_login'];
            $this->password = $_POST['reg_password'];
            // обработка логина пароля для безопасности
            $this->login = stripslashes($this->login);
            $this->login = htmlspecialchars($this->login);
            $this->login = trim($this->login);
            $this->password = stripslashes($this->password);
            $this->password = htmlspecialchars($this->password);
            $this->password = trim($this->password);
        }

        if (isset($_POST['login']) and isset($_POST['password'])) {
            $this->login = $_POST['login'];
            $this->password = $_POST['password'];
            // обработка логина пароля для безопасности
            $this->login = stripslashes($this->login);
            $this->login = htmlspecialchars($this->login);
            $this->login = trim($this->login);
            $this->password = stripslashes($this->password);
            $this->password = htmlspecialchars($this->password);
            $this->password = trim($this->password);
        }

        // check data
        if ($this->login == '' or $this->password == '' or empty($this->login) or empty($this->password) or strlen($this->login)<4 or strlen($this->password)<6 or $this->login == $this->password) {
            unset($this->login);
            unset($this->password);
            exit("Возможно, вы ввели не всю информацию, логин = пароль или являются слишком короткие, вернитесь назад и заполните поля корректно!");
        } else {}
        
        return $this;
    }
    
    public function saveUser() 
    {
        if ($this->checkAdmin() == true) {
            $this->role = "admin";
        } 
        else {
            $this->role = "user";
        }
        
        $hash_auth_password = password_hash("$this->password", PASSWORD_DEFAULT); // хэшируем введённый пароль
        $reg_date = date("d-m-Y");
        // проверка на существование пользователя с таким же логином. Ищем user_id в таблице user, где login = переменной login
        $result = queryMysql("SELECT user_id FROM user WHERE login='$this->login'");
        $myrow = $result->fetch_array();

        // если user уже есть, то обрываем регистрацию
        if (!empty($myrow['user_id'])) {
                exit ("Извините, введённый вами логин уже зарегистрирован.");
        }
        else {
            // если такого нет, то сохраняем данные и проверяем, есть ли ошибки
            if (queryMysql("INSERT INTO user (login, password, role, reg_date) VALUES('$this->login' , '$hash_auth_password','$this->role', $reg_date)")) {
                    echo "<br>Пользователь добавлен.<br>";
            }
            else {
                    echo "<br>Ошибка! Вы не зарегистрированы.<br>";
            }
        }		      
    }
    
    public function autharization() 
    {
        $this->login = $_POST['login'];
        $this->password = $_POST['password'];
        //извлекаем из базы все данные о пользователе
        $resultat = queryMysql("SELECT * FROM user WHERE login='$this->login'"); 
        $myrow = $resultat->fetch_array();

            //если пользователя с введенным логином не существует
        if (empty($myrow['login'])) {
            exit ("<br>Извините, введённый вами Логин неверный.<br>"); // не пишем сообщение что этот логин занят, защита от перебора
        }
            //если существует, то сверяем пароли
        else { 
            $db_pass_hash = $myrow['password'];  // присваиваем хэш пароля из БД нашей переменной
            if (password_verify("$this->password", "$db_pass_hash") and $myrow['ban'] == '') {	//если пароль равен хэшу пароля, то запускаем сессию
                $_SESSION['login'] = $myrow['login']; 
                $_SESSION['user_id'] = $myrow['user_id'];		
                $_SESSION['role'] = $myrow['role'];
                header('Location: start.php');
            }
            else {
                echo "<br>Извините, введённый вами логин или пароль неверный_2 или вы забанены.<br>";
            }
        }
        return $this;
    }
    
    public function checkAuth() 
    {
        //session_start();
        if (empty($_SESSION['login']) || empty ($_SESSION['user_id']) || empty ($_SESSION['role'])) {
            //header('Location: start.php');
            require_once 'auth.php';
            return false;
        }
        //если уже авторизован
        else {	
            $this->client_ip = $_SERVER['REMOTE_ADDR'];
            $this->user_id = $_SESSION['user_id'];
            $this->current_user = $_SESSION['login'];
            $this->role = $_SESSION['role'];
        }
        return $this;
    }
    
    public function shortUserInfo()
    {
        
        // Sign out text
        $random_otvet = rand(1,5);
        switch ($random_otvet) {
            case 1:
                    $random_logout_text = "Выйти проветриться";
                    break;
            case 2:
                    $random_logout_text = "Выйти из админки";
                    break;
            case 3:
                    $random_logout_text = "Разлогиниться";
                    break;
            case 4:
                    $random_logout_text = "Выход";
                    break;
            case 5:
                    $random_logout_text = "Logout";
                    break;
            default:
                    print "error";
        }
        $this->checkAuth();
        if ($this->current_user != '') {
            $userpic = $this->getUserPic();
            echo "$userpic<br><br> Вы вошли как <a title = 'Нажмите для подробной информации' href='user.php'>$this->current_user</a>, ваш IP <a target='blank' href='https://ip.osnova.news/?ip=$this->client_ip'>$this->client_ip</a>";
            echo "<br><a href='?sign_out'>$random_logout_text</a><br><br>";
            return true;
        } 
        else {
            echo "Вы не авторизованы.<br>";
            return false;
        }
    }
    
    public function signOut()
    {
        $this->checkAuth();        
        $today_date_time = date("D M j H:i:s e Y"); 
        $last_login_log = "IP: $this->client_ip, Дата: $today_date_time";
        //add log auth to DB
        if (queryMysql("UPDATE user SET log = '$last_login_log' WHERE login = '$this->current_user'")) {
        }
        else {
            echo "<br>Ошибка логирования<br>";
        }
        session_destroy();
        header('Location: logout.php');
    }
 
    //date counter
    public function dateDiffCounter()
    {
        $this->checkAuth();
        $now = date('d-m-Y');
        $now_timestamp = strtotime($now);
        // get registration date
        $result = queryMysql("SELECT reg_date FROM user WHERE login='$this->current_user'");
        $reg_date_db = $result->fetch_array();
        $string_reg_date_db = $reg_date_db[0];
        $timestamp_reg_date_db = strtotime($string_reg_date_db);
        $diff_date = ($now_timestamp - $timestamp_reg_date_db) / 86400;
        return $diff_date;
    }
    
    /* Info about current user */
    public function userInfo() 
    {
        if ($this->checkAdmin()) { // you are Admin? Get settings
            $settings = "<td><a href='settings.php'>Settings</a></td>";
        } else {}

        echo "<div align='center'>";
        $s = queryMysql("SELECT * FROM user WHERE login='$this->current_user' ORDER BY user_id"); 

        // Выводим заголовок таблицы:
        echo "<table class='table'>";
        echo "<tr><td>Avatar</td><td>User ID</td><td>Login</td><td>Role</td><td>Last Login</td><td>Change pass</td><td>Days on site</td><td>Registered</td><td>Settings</td>";
        echo "</tr>";

        // Выводим таблицу:  получаем число рядов в выборке , $c меньше кол-ва рядов в выборке ($s->num_rows).
        for ($c=0; $c<$s->num_rows; $c++) {
                echo "<tr>";
                $f = $s->fetch_array();
                $count_days = $this->dateDiffCounter();
                $userpic = $f['userpic'];
                if ($userpic == ''){
                    $userpic = "<a href='upload_pic.php'>Upload avatar</a>";
                } else {$userpic = $this->getUserPic();}
                echo "<td>$userpic</td><td>$f[user_id]</td><td>$f[login]</td><td>$f[role]</td><td>$f[log]</td><td><a href='upd_pass.php'><img title='Смена пароля' src='img/pass.png'></a></td><td>$count_days</td><td>$f[reg_date]</td>$settings";
                echo "</tr>";
        }
        echo "</table>";
    }
    
    public function checkAdmin()
    {
        $this->checkAuth();
        if ($this->role == "admin") {
            return true;
        } else {return false;}
    }
    
    /* Get list of users */
    public function getMembersList()
    {
        if ($this->checkAdmin()) {
            echo "<div align='center'>";
            $s = queryMysql("SELECT * FROM user ORDER by user_id"); // запрос с сортировкой по user_id

            // Выводим заголовок таблицы:
            echo "<table border='1' width='40%' bgcolor='yellow'>";
            echo "<tr><td><b>Login</b></td> <td><b>User ID</b></td> <td><b>Ban</b></td>";
            echo "</tr>";

            // Выводим таблицу:  , получаем число рядов в выборке
            for ($c=0; $c<$s->num_rows; $c++) {
                echo "<tr>";
                $f = $s->fetch_array();
                $banned = $f['ban'];
                if ($banned == '') {
                        $banned = "<a href='?ban=$f[user_id]'>Забанить</a>";
                } 
                else {$banned = "<a href='?unban=$f[user_id]'>Разбанить</a>";}
            echo "<td>$f[login]</td> <td>$f[user_id]</td><td>$banned</td>";
            echo "</tr>";
            }
            echo "</table>";
        }
        else {echo "Доступ запрещён";}
    }
    //ban and unban
    public function getBan()
    {
        if ($this->checkAdmin() == true) {
            if (isset($_GET['ban'])) {
                $this->user_id = $_GET['ban'];
                echo "$user_id<br>";
                if (queryMysql("UPDATE user SET ban = 'yes' WHERE user_id = '$this->user_id'")) {
                    header('Location: members.php');
                }
            } else {}

            if (isset($_GET['unban'])) {
                $this->user_id = $_GET['unban'];
                if (queryMysql("UPDATE user SET ban = '' WHERE user_id = '$this->user_id'")) {
                    header('Location: members.php');
                }
            } else {}
        }
    }
    
    public function changePass() 
    {
        $this->checkAuth();
        
        if (!isset($_POST['new_password']) and !isset($_POST['old_password']) or ($_POST['new_password']) == ($_POST['old_password']) or strlen($_POST['new_password'])<6) {
            echo "Пароли не введены, равны между собой или менее 6 символов";
        }
        else {		
            $your_old_password = $_POST['old_password']; // действующий, по мнению юзера, пароль
            $real_old_password_hash = queryMysql("SELECT password FROM user WHERE login='$this->current_user'"); // реально действ. хэш пароля который в базе
            $result_real_old_password_hash = $real_old_password_hash->fetch_array();
            $result_real_old_password_hash = $result_real_old_password_hash['password'];

        //если старый пароль совпал с хэшем
            if (password_verify("$your_old_password", "$result_real_old_password_hash")) {
                echo "действующий пароль и хэш совпадают!";
                $new_password = $_POST['new_password'];
                $new_password = password_hash("$new_password", PASSWORD_DEFAULT); // хешируем пароль
                // update pass	
                queryMysql("UPDATE user SET password = '$new_password' WHERE login='$this->current_user'");
                header('Location: user.php');
            }
            else {
                echo "Ошибка вы ввели не верный действующий пароль";
            }
        }
    }
    
    public function uploadFavicon() 
    {    
        $this->checkAdmin();
        if ($_FILES) {
            $name = $_FILES['filename']['name'];
            switch($_FILES['filename']['type']) {
                case 'image/x-icon':
                    $ext = 'ico';
                    break;
                case 'image/png':
                    $ext = 'png';
                    break;
                default:           
                    $ext = '';
                    break;
            }
            if ($ext) {
                $favicon_path = "img/favicon/favicon.$ext";
                move_uploaded_file($_FILES['filename']['tmp_name'], $favicon_path);
                queryMysql("UPDATE settings SET favicon = '$favicon_path'");
            }
            else {
                echo "$name is not an accepted image file";
            }
        }
        else { 
          echo "No image has been uploaded";
        }
    }
    
    public function choiseUserPic() 
    {
        if (isset($_POST['my_userpic'])) {
            $this->checkAuth();
            $user_pic = $_POST['my_userpic'];
            $userpic_full_path = "img/userpics/$user_pic";
            queryMysql("UPDATE user SET userpic = '$userpic_full_path' WHERE login = '$this->current_user'");
        }
    }
    
    public function uploadUserPic()
    {
        $this->checkAuth();
        if ($_FILES) {
            $name = $_FILES['filename']['name'];
            switch($_FILES['filename']['type']) {
                case 'image/jpeg':
                    $ext = 'jpg';
                    break;
                case 'image/gif':
                    $ext = 'gif';
                    break;
                case 'image/png':
                    $ext = 'png';
                    break;
                case 'image/tiff':
                    $ext = 'tif';
                    break;
                default:
                    $ext = '';
                    break;
            }
            if ($ext) {
              $userpic_full_path = "img/userpics/$this->current_user.$ext";
              move_uploaded_file($_FILES['filename']['tmp_name'], $userpic_full_path);
             // echo "Uploaded image '$name' as '$n':<br>";
             queryMysql("UPDATE user SET userpic = '$userpic_full_path' WHERE login = '$this->current_user'");
            }
            else {
                echo "$name is not an accepted image file";
            }
        }
        else { 
          echo "No image has been uploaded";
        }
    }
    
    public function getUserPic()
    {
        $this->checkAuth();
        $s = queryMysql("SELECT userpic FROM user WHERE login = '$this->current_user'");
        $f = $s->fetch_array();
        $path = "<a title='Смена аватара' href='upload_pic.php'><img class='avatar' width='150px' height='150px' src='$f[userpic]'></a>";
        return $path;
    }
}
