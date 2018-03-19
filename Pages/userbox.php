<?php
Head('Pagina principala');
?>

<body>

<div class="wrapper_all">
<aside class="left-sidebar">
			<?php  ShowAllCategories();     ?>
		</aside><!-- .left-sidebar -->

<div class="wrapper" >

    <?php Menu();  MessageShow(); ?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<ul style="list-style-type: none;">
                     <?php 
                    
                     	$books=mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books` where `id` in (SELECT `book_id` FROM `wishread` where user_id='$_SESSION[USER_ID]')");

                    
		                    while ($row=mysqli_fetch_array($books)) {
		                    	if($_SESSION['USER_LOGIN_IN'])
		                    	{
		                    		BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR",$row['image_linq']),$row['download_linq'],'/viewbook/viewbook/detail/'.$row['id']);
		                        }else
		                        {
		                        	BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR",$row['image_linq']),'login','/viewbook/viewbook/detail/'.$row['id']);
		                        }
		                    }
                				      
				  ?>

				</ul>
				
			</main><!-- .content -->
		</div><!-- .container-->

		

	</div><!-- .middle-->

</div><!-- .wrapper -->

<footer class="footer">
	ReadAboock : every dey is mor beautifull with me!!!!
</footer><!-- .footer -->
</div>
</body>
</html>