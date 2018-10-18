<?php
Head('Pagina principala');
?>
<body>

    <?php 
    
     if($Module=='viewbook')
     {
	    $Param['detail']==FormChars($Param['detail']);
	    $_SESSION['DETAILBOOK_ID']=$Param['detail'];
        $bookQuery=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE id='$Param[detail]'");

        $updateViews=mysqli_query($CONNECT, "UPDATE `books` SET rating=rating+1 WHERE id='$Param[detail]'");


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
             if(!$ifBookExist)
                {
                    ////cartea deja exista in lista 
                }else
                {
                    $updateDownloads=mysqli_query($CONNECT, "UPDATE `books` SET downloands_number =downloands_number +1 WHERE id='$Param[WantRead]'");
                    $addedCombination=mysqli_query($CONNECT, "INSERT INTO `wishread` VALUES ('','$_SESSION[USER_ID]','$_SESSION[DETAILBOOK_ID]')");
                }
             
           }

     } ?>
<div class="wrapper" >
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">


				<div style="margin: 30 auto;">
					<br>
				    <div style="width:105px;"><?php echo '<img class="bookImg" src="../../../'.$qr['image_linq'].'"/>'; ?></div>
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