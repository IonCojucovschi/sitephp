<?php
Head('Pagina principala');
?>
<link href="../../../Resources/style.css" rel="stylesheet">
<body>

<div class="wrapper_all">
<aside class="left-sidebar">
			<strong>Left Sidebar:</strong> Integer velit. Vestibulum nisi nunc, accumsan ut, vehicula sit amet, porta a, mi. Nam nisl tellus, placerat eget, posuere eget, egestas eget, dui. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In elementum urna a eros. Integer iaculis. Maecenas vel elit.
		</aside><!-- .left-sidebar -->

<div class="wrapper" >

    <?php Menu();   MessageShow();?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<?php  
                  echo var_dump($_SESSION['DETAILBOOK_ID']);   /// TO DO    must implement Book detail View 
				  ?>

				
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