<?php
Head('Pagina principala');
?>

<body>

<div class="wrapper_all">
<aside class="left-sidebar">
		<?php 
         //// show alll categories   

		 $qrii=mysqli_query($CONNECT, "SELECT DISTINCT `category` , count(`id`) as quantity  FROM `books` GROUP BY `category`");

		$showCategory='<ul style="list-style: none;">';
	    if($qrii)
	     {
	     	while($bo = mysqli_fetch_assoc($qrii)) {
	         $showCategory.='<li class="menuCategory" 
             ><a>'.$bo['category']."    ".$bo['quantity'].'</a></li>';
	        }
	     }
	    $showCategory.='</ul>';

	    echo $showCategory;



		//ShowAllCategories(); 
		?>
		
		</aside><!-- .left-sidebar -->

<div class="wrapper" >

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

</div><!-- .wrapper -->

<footer class="footer">
	ReadAboock : every dey is mor beautifull with me!!!!
</footer><!-- .footer -->
</div>
</body>
</html>