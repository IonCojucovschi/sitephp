<?php
Head('Pagina principala');
?>
<link href="../../../Resources/style.css" rel="stylesheet">
<body>

<div class="wrapper_all">
<aside class="left-sidebar">
			<?php  ShowAllCategories();     ?>
		</aside><!-- .left-sidebar -->

<div class="wrapper" >

    <?php 
     MessageShow();
    
     if($Module=='viewbook')
     {
	    $Param['detail']==FormChars($Param['detail']);
	    $_SESSION['DETAILBOOK_ID']=$Param['detail'];
        $bookQuery=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE id='$Param[detail]'");
        $qr=mysqli_fetch_assoc($bookQuery);
         if(!$bookQuery)MesageSend(1,'Nu sa putut extrage asa carte.');  


         if ($Module=='viewbook' and $Param['WantRead']) {

             $Param['WantRead']==FormChars($Param['WantRead']);
             $_SESSION['DETAILBOOK_ID']=$Param['WantRead'];
              $bookQuery=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE id='$Param[WantRead]'");
             $qr=mysqli_fetch_assoc($bookQuery);
             if(!$bookQuery)MesageSend(1,'Nu sa putut extrage asa carte.');  
              ////there must put code for save book into garbadge  
             $ifBookExist=mysqli_query($CONNECT,"SELECT * from `wishread` where user_id='$_SESSION[USER_ID]' and book_id=$_SESSION[DETAILBOOK_ID]");
             if(mysqli_fetch_assoc($ifBookExist))
                {
                        ////cartea deja exista in lista 
                }else
                {
                    $addedCombination=mysqli_query($CONNECT, "INSERT INTO `wishread` VALUES ('','$_SESSION[USER_ID]','$_SESSION[DETAILBOOK_ID]')");
                }
             
           }







     }

    Menu(); ?>
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