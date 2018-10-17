<?php
Head('Pagina principala');
?>

<body>

<div class="wrapper" >
	  <div class="header">headerul </div>
	  <?php Menu();  MessageShow(); ?><!-- navigation bar -->
	<div class="top">
		<ul id="main">
			<li>
				<a href="new"></a>
			</li>
			<img id="new" src="https://www.helperhelper.com/wp-content/uploads/2015/10/bigstock-Stack-Of-Books-70033240.jpg">
			<li>
				<a href="best"></a>
			</li>
			<img id="best" src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/279888/1360/900/m1/fpnw/wm1/jhgtmbe2asdop4la4pprhgnapb7ry0a0oobq3lve4skeufnmw9ngeus2h08kxoo2-.jpg?1419244216&s=ed78544680e179b93db67115bd9cbb48">
		</ul>
	</div>

<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>

		<div class="col-md-6 recs">
			<div class="title">Recomandari</div>
					<ul class="books" style="list-style-type: none;">
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
					
		</div>
		<div class="col-md-3 "><!-- best Views -->
			<img id="short"  src="http://www.sollasbooks.com/wp-content/gallery/thin-twin-red-square/thin-twin-red.jpg">
		</div>


	</div>


</div><!-- .wrapper -->

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>