<?php
Head('Pagina principala');
?>
<link href="../../../Resources/style.css" rel="stylesheet">

<body>

<div id="left-sidebar">
		<?php 
   
		ShowAllCategories(); 
		?>
		
		</div><!-- .left-sidebar -->

<div id="wrapper" >

    <?php 
      if($Module=='category')
     {
       $Param['name']==FormChars($Param['name']);
	    $_SESSION['CATEGORY_BOOK']=$Param['name'];

	 }
    Menu();  MessageShow(); ?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
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
				
			</main><!-- .content -->
		</div><!-- .container-->

		

	</div><!-- .middle-->
<div class="footer">
    ReadAboock : every dey is mor beautifull with me!!!!
</div>
</div><!-- .wrapper -->

<script type="text/javascript" src="../../../Resources/jquery.js"></script>
<script type="text/javascript" src="../../../Resources/script.js"></script>
</body>
</html>