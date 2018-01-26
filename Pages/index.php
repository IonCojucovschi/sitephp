<?php
Head('Pagina principala');
?>

<body>

<div class="wrapper_all">
<aside class="left-sidebar">
			<strong>Left Sidebar:</strong> Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
		</aside><!-- .left-sidebar -->

<div class="wrapper" >

    <?php Menu();   ?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<ul style="list-style-type: none;">
                     <?php  
				   $books=mysqli_query($CONNECT,"SELECT `title`,`download_linq`,`image_linq` FROM `books`");
                    while ($row=mysqli_fetch_array($books)) {
                    	BookFoorm($row['title'],$row['image_linq'],$row['download_linq'],'sim');
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