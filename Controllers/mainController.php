<?php
//read https://habr.com/ru/post/150267/
$path_class = "./Models";
require_once "$path_class/config.php";
require_once "$path_class/User.class.php";
require_once "$path_class/Client.class.php";
require_once "$path_class/Article.class.php";


class MainController
{
    public function main()
    {
        require_once './start.php';
    }
    
    public function routeBlog(string $postname){
        
        $resultat = queryMysql("SELECT * FROM posts where postname = '$postname'");
        $f = $resultat->fetch_array();
        $article['name'] = $f['title'];
        $article['text'] = $f['article'];        
        
            if ($resultat->num_rows != 0) {
                
                require_once './templates/single_post.php';
            }
            else {
                $article['name'] = 'Blog';
                $article['text'] = 'Описание блога находится в процессе реализации. Попробуйте зайти позже.';
                require_once './templates/blog.php';
            }   
    }
    
    
            
}


/*
 * User Class
 */

if (isset($_POST['signup']) or isset ($_POST['signup_admin'])) {
   //$new_user = new User();
   // $new_user->safeCheckLogPass()->saveUser();
    $new_user = (new User)
    ->safeCheckLogPass()
    ->saveUser();
}

if (isset($_POST['autharization'])) {
    $new_user = (new User)
    ->safeCheckLogPass()
    ->autharization();
}

if (isset($_GET['sign_out'])) {
    $new_user = (new User)
    ->signOut();
}

//favicon
if (isset($_POST['upload_favicon'])) {
    $new_user = (new User)->uploadFavicon();
}

/* Upload userpic*/
if (isset($_POST['upload_userpic'])) {
    $new_user = (new User)->uploadUserPic();
}

/* Ban and unban user */
if (isset($_GET['ban']) or isset($_GET['unban'])) {
    $new_user = new User();
    
    if ($new_user->checkAdmin() == true) {
       $new_user->getBan();
    } else { header('Location: 404.php');}
}

/* Change user password request user.php -> upd_pass.php */
if (isset($_POST['update_pass'])) {
     $new_user = (new User)->changePass();
}

if (isset($_POST['choise_userpic'])) {
    $new_user = (new User)->choiseUserPic();
}

/*
 *  Client Class
 */

/* Delete client of company by ID */
if (isset($_POST['nomerID'])) {
    $client = (new Client)->deleteClient($drop_id);
}

/* Mass delete */
if (isset($_POST['clear_bd'])) {
    $client = (new Client)->massDeleteClients();
}

/* Add client */
if (isset($_POST['add_client'])) {
    $client = (new Client)->addClient();
}

/* Search client*/ 
if (isset($_GET['poisk'])) {
    $client = (new Client)->searchByFamily();
} 

if (isset($_GET['change_data_client']))	{
    $client = (new Client)->changeDataClient();
}