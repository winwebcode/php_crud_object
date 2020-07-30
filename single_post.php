<?php require_once 'Controllers/mainController.php'; ?>
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

<body>

<div class="wrapper">

	<header class="header">
		<img src="/php_crud_object/img/head.png">
	</header><!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
                                                       
                            <p><?php echo $article['text'] ?></p><br><br><br>
                            
			</main><!-- .content -->
		</div><!-- .container-->

		<aside class="right-sidebar">
                    <div align="center">
			<h3>Новые записи</h3>
                        <br>
                        <?php $sidebarPosts = new Article();
                        $sidebarPosts->getsidebarPosts();
                        ?>
                        </div>
                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
	<div align="center"><strong><a href="/php_crud_object/">phpCrudObject 2020</a></strong></div>
</footer><!-- .footer -->

</body>
</html>