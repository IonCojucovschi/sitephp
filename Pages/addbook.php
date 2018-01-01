<?php
Head('Adaoga carti');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">
<body>

<div class="wrapper" >

    <?php Menu();   ?>
	<!-- .header-->

	<div class="middle">

		<div class="container">
			<main class="content">
				
<div class="wrapper_container">
  <h2>Forma pentru adaogarea cartilor</h2><hr class="hr1">
  <div class=formUser>
  <form class="register"  method="POST" action="/account/register" onsubmit="return validateForm()">
       <p><i>Completati urmatoarea forma.</i></p>
       <fieldset id="userData">
         <legend>Detaliile Despre Carte</legend>
            <input class="registercomponent"  id="title" name="title" placeholder="Titlul Cartii" autofocus required=""><br>
            <input class="registercomponent"  id="author" name="author" placeholder="Autorul Cartii" autofocus required><br>
            <input class="registercomponent"  id="category" name="category" placeholder="category" autofocus required><br>
            <label class="registercomponent">Data publicarii<em>*</em></label>
            <input class="registercomponent"  id="date" name="date" placeholder="date" type="date" autofocus required><br>
            <input class="registercomponent"  id="description" name="description" placeholder="Descrieti pe scurt continutul cartii" autofocus required  type="text"><br>
            <input class="registercomponent"  id="surname" name="author" placeholder="Autorul Cartii" autofocus required><br>
            <input class="registercomponent"  id="surname" name="author" placeholder="Autorul Cartii" autofocus required><br>
           

       </fieldset>
        <fieldset id="personalData">
            <legend>Informatie Aditionala</legend>
            <input class="registercomponent" id="" name ="login"  autofocus required><br>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>
            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>

           <img class="registercomponent" src="Resources/captcha.php" alt="Captcha">
 
        </fieldset>
            

        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Create New User" href='/account'></p>
  </form>
  </div>  
</div>



			</main><!-- .content -->
		</div><!-- .container-->

		

	</div><!-- .middle-->

</div><!-- .wrapper -->





<?php  Footer(); ?>
<!-- adaogam footerul -->
</body>
</html>
