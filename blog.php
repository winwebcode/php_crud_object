<?php require_once 'Controllers/mainController.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script><![endif]-->
	<title><?php echo $article['name'];?></title>
	<meta name="<?php echo $article['keywords'];?>" content="" />
	<meta name="<?php echo $article['description'];?>" content="" />
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
                            <strong>Content:</strong> Sed placerat accumsan ligula. Aliquam felis magna, congue quis, tempus eu, aliquam vitae, ante. Cras neque justo, ultrices at, rhoncus a, facilisis eget, nisl. Quisque vitae pede. Nam et augue. Sed a elit. Ut vel massa. Suspendisse nibh pede, ultrices vitae, ultrices nec, mollis non, nibh. In sit amet pede quis leo vulputate hendrerit. Cras laoreet leo et justo auctor condimentum. Integer id enim. Suspendisse egestas, dui ac egestas mollis, libero orci hendrerit lacus, et malesuada lorem neque ac libero. Morbi tempor pulvinar pede. Donec vel elit.
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
                        <br><br><br><br>
                    
                    
                    
                    
                    <strong>Right Sidebar:</strong> Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
		</aside><!-- .right-sidebar -->

	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
	<div align="center"><strong><a href="/php_crud_object/">phpCrudObject 2020</a></strong></div>
</footer><!-- .footer -->

</body>
</html>