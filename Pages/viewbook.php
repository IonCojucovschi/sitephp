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

    <?php 
    
     if($Module=='viewbook')
     {
	    $Param['detail']==FormChars($Param['detail']);
	    $_SESSION['DETAILBOOK_ID']=$Param['detail'];
        $bookQuery=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE id='$Param[detail]'");
        $qr=mysqli_fetch_assoc($bookQuery);
         if(!$bookQuery)MesageSend(1,'Nu sa putut extrage asa carte.');  


         if ($Module=='viewbook' and $Param['WantRead']) {

             $Param['detail']==FormChars($Param['WantRead']);
             $_SESSION['DETAILBOOK_ID']=$Param['WantRead'];
              $bookQuery=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE id='$Param[WantRead]'");
             $qr=mysqli_fetch_assoc($bookQuery);
             if(!$bookQuery)MesageSend(1,'Nu sa putut extrage asa carte.');  
              ////there must put code for save book into garbadge  
           }







     }

    Menu();   MessageShow();?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				<div style="margin: 30 auto;">
					<br>
				    <?php echo '<div class="book_wrapper" style="margin-left: 20px; float: left; background-image:url(../../../'.$qr['image_linq'].');"></div>'; ?>
                    <div style="float: left; margin-left: 20px; padding-top: 30px;">
                         <b>Titlu: </b><?php  echo " ".$qr['title']  ?><br><br>
                         <b>Autorul: </b><?php  echo " ".$qr['author']  ?><br><br>
                         <b>Data Publicarii: </b><?php  echo " ".$qr['date']  ?><br><br>
                         <b>Categoria: </b><?php  echo " ".$qr['category']  ?><br><br>
                         <b>Rating:</b><?php  echo " ".$qr['rating']  ?><br><br>
                         <b>Descarcari:</b><?php  echo " ".$qr['downloands_number']  ?><br><br>
                         
                    </div>
					<a type="submit" class="details" href=<?php echo '/viewbook/viewbook/WantRead/'.$qr['id'] ;?> >Adauga in Cos</a>

				</div>
			    <div style="display: block; margin-top: 270px; margin-left: 20px;">
			    	<br>
                 	<b>Descriere:</b>   <?php echo " ".$qr['description']; ?>
                </div>			 
				<ul style="list-style-type: none;">
                     <?php  
				   $books=mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books`");
                    while ($row=mysqli_fetch_array($books)) {
                    	$contor++;
                    	if($contor>10) break;
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

</div><!-- .wrapper -->

<footer class="footer">
	ReadAboock : every dey is mor beautifull with me!!!!
</footer><!-- .footer -->
</div>
</body>
</html>