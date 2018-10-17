<?php
Head('Pagina principala');
?>
<link href="../../../Resources/style.css" rel="stylesheet">

<body>
<div class="wrapper" >
	  <div class="header">headerul </div>
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
			<div class="title">Carti recomandate</div>
					<ul class="books" style="list-style-type: none;">
				<ul style="list-style-type: none;">
                     <?php  
				   $books=mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books` Where category='$_SESSION[CATEGORY_BOOK]'");
                    while ($row=mysqli_fetch_array($books)) {
                    
                        if($_SESSION['USER_LOGIN_IN'])
                    	{
                    		BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR","../../../".$row['image_linq']),"../../../".$row['download_linq'],'/viewbook/viewbook/detail/'.$row['id']);
                        }else
                        {
                        	BookFoorm($row['title'],str_replace(" ",".DIRECTORY_SEPARATOR","../../../".$row['image_linq']),'../../../login','/viewbook/viewbook/detail/'.$row['id']);
                        }
                    }
				  ?>

				</ul>
		</div>
		<div class="col-md-2 best10"><!-- best Views -->
			<img id="short"  src="http://www.sollasbooks.com/wp-content/gallery/thin-twin-red-square/thin-twin-red.jpg">
		</div>


	</div>


</div><!-- .wrapper -->

<script type="text/javascript" src="../../../Resources/jquery.js"></script>
<script type="text/javascript" src="../../../Resources/script.js"></script>
</body>
</html>