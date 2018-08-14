<?php
Head('Pagina principala');
?>

<body>

       <div id="left-sidebar">
		<?php 
   
		ShowAllCategories(); 
		?>
		
		</div><!-- .left-sidebar -->

	<div id="wrapper" >

	    <?php Menu();  MessageShow(); ?>
		<!-- .header-->

		<div class="middle">

			<div class="container">
				<main class="content">
					<ul style="list-style-type: none;">
	                     <?php  
					   $books=mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books`");
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

		<div class="footer">
			<a href="https://mega.nz/#!EhVRAIjA!2sE6djoMhImblTHOpQpF1k1gCh-BtlHOyODMylTiVhI">Download Android Appp</a>
		</div><!-- .footer -->


	</div><!-- .wrapper -->

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>