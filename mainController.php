<?php
require_once "config.php";
require_once 'User.class.php';
require_once 'Client.class.php';
require_once 'Article.class.php';

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
    ->checkAuth()
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

if (isset($_GET['/reg.php']))	{
    echo "XXXXXXXXXXXXXXXXXXXXX";
}