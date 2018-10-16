<?php
ULogin(1);
Head('Adaoga carti');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">
<body>
<div id="left-sidebar">
    <?php 
   
    ShowAllCategories(); 
    ?>
    
    </div><!-- .left-sidebar -->
<div id="wrapper" >

    <?php Menu(); 
          MessageShow();

      ?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				
<div class="wrapper_container">
  <h2>Forma pentru adaogarea cartilor</h2><hr class="hr1">
  <div class=formUser>
  <form class="register"  method="POST" action="/book/addbook" onsubmit="return validateForm()" enctype="multipart/form-data">
       <p><i>Completati urmatoarea forma.</i></p>
       <fieldset id="userData">
         <legend>Detaliile Despre Carte</legend>
            <input class="registercomponent"  id="title" name="title" placeholder="Titlul Cartii" autofocus required=""><br>
            <input class="registercomponent"  id="author" name="author" placeholder="Autorul Cartii" autofocus required><br>
            <label class="registercomponent" >Categoria</label>
            <select class="registercomponent"  id="category" name="category">
              <option>Toate</option>
              <option>Dragoste</option>
              <option>Fantastice</option>
              <option>Istorice</option>
              <option>Autoformare</option>
              <option>Detective</option>
              <option>Horor</option>
              <option>Copii</option>
              <option>Bucatarie</option>
              <option>Politica</option>
              <option>Sanatate</option>
              <option>Elevi</option>
              <option>Programare</option>

            </select><br>
            <label class="registercomponent">Data publicarii<em>*</em></label>
            <input class="registercomponent"  id="date" name="date" placeholder="date" type="date" autofocus required><br>
            <textarea class="registercomponent"  rows="10" cols="70" id="description" name="description" placeholder="Descrieti pe scurt continutul cartii" autofocus required  type="text"></textarea><br>

           

       </fieldset>
        <fieldset id="personalData">
            <legend>Informatie Aditionala</legend>
            <label class="registercomponent">Selecteaza imaginea </label>
            <input class="registercomponent" id="image" name ="image"  type="file" autofocus required><br>
            <label class="registercomponent">Adaoga continutul cartii </label>
            <input class="registercomponent" id="bookcontent" type="file" name="bookcontent" autofocus required><br>
            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>

           <img class="registercomponent" src="Resources/captcha.php" alt="Captcha">
 
        </fieldset>
            

        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Add New Book" href='/book'></p>
  </form>
  </div>  
</div>



			</main><!-- .content -->
		</div><!-- .container-->

		

	</div><!-- .middle-->

<?php  Footer(); ?>
<!-- adaogam footerul -->
</div><!-- .wrapper -->

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>
