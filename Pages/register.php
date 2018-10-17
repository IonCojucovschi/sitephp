<?php
ULogin(0);
Head('Inregistrare');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">
<body>
<div class="wrapper" >
	  <div class="header">headerul </div>
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
  <form class="register"  method="POST" action="/account/register" onsubmit="return validateForm()">
       <p><i>Completati urmatoarea forma.</i></p>
       <fieldset id="userData">
         <legend>Detaliile Utilizatorului</legend>
            <label  class="registercomponent"  for="name">Name <em>*</em></label>
            <input class="registercomponent"  id="name" name="name" placeholder="Jane" autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
            <label class="registercomponent" for="surname">Surname <em>*</em></label>
            <input class="registercomponent"  id="surname" name="surname" placeholder="Smith" autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
             <label class="registercomponent"  for="email">Email <em>*</em></label>
            <input class="registercomponent"  id="email" name="email" type="email" required><br>
           

       </fieldset>
        <fieldset id="personalData">
            <legend>Informatia Personala</legend>
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required maxlength="15" pattern="[A-Za-z-0-9]{3,15}" title="Trebuie sa fie cuprins intre 3 si 15 simboluri"><br>
            <label class="registercomponent" for="pass">Parola<em>*</em></label>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>
            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>

           <img class="registercomponent" src="Resources/captcha.php" alt="Captcha">
 
        </fieldset>
            

        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Create New User" href='/account'></p>
  </form>
		</div>
		<div class="col-md-2 best10"><!-- best Views -->
			<img id="short"  src="http://www.sollasbooks.com/wp-content/gallery/thin-twin-red-square/thin-twin-red.jpg">
		</div>


	</div>


</div><!-- .wrapper -->

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>
