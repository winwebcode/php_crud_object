<?php require_once './templates/header.php';?>

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

<?php require_once './templates/footer.php';?>