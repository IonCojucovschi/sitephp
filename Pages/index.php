<?php
Head('Pagina principala');
?>
<body>
<div class="wrapper" >
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
			<div class="title">Carti recomandate</div>
					<ul class="books" style="list-style-type: none;">
	                     <?php  
					   $books=mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books`");
	                    while ($row=mysqli_fetch_array($books)) {
	                    	if($_SESSION['USER_LOGIN_IN'])
	                    	{
	                    		BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR",$row['image_linq']),$row['download_linq'],'/viewbook/viewbook/detail/'.$row['id'],$row['id']);
	                        }else
	                        {
	                        	BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR",$row['image_linq']),'login','/viewbook/viewbook/detail/'.$row['id'],$row['id']);
	                        }
	                    }
					  ?>

					</ul>
		</div>
	<?php 
	  BestBooks();//// best books
	 ?>


	</div>


</div><!-- .wrapper -->

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>