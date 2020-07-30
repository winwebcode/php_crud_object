<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
	<title><?php echo $article['name'];?></title>
	<meta name="keywords" content="<?php echo $article['keywords'];?>" />
	<meta name="description" content="<?php echo $article['description'];?>" />
	<link href="/php_crud_object/styles/blog_style.css" rel="stylesheet">
</head>
<?php require_once 'Controllers/mainController.php'; ?>
<body>

<div class="wrapper">

	<header class="header">
		<img src="/php_crud_object/img/head.png">
	</header><!-- .header-->