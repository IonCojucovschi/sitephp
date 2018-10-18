<?php
ULogin(1);///pagina e pentru utilizatori
Head('Pagina principala');
?>
<body>
<div class="wrapper" >
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
			      <form class="register"  method="POST" action="/account/edit" onsubmit="return validateForm()">
			       <fieldset id="userData">
			         <legend>Modifica datele</legend>
			            <label  class="registercomponent"  for="name">Name <em>*</em></label>
			            <input class="registercomponent"  id="name" name="name" value=<?php echo '"'.$_SESSION['USER_NAME'].'"'; ?> autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
			            <label class="registercomponent" for="surname">Surname <em>*</em></label>
			            <input class="registercomponent"  id="surname" name="surname" value=<?php echo '"'.$_SESSION['USER_SURNAME'].'"'; ?> autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,20}" title="Trebuie sa fie cuprins intre 3 si 20 simboluri"><br>
			             <label class="registercomponent"  for="email">Email <em>*</em></label>
			            <input class="registercomponent"  id="email" name="email" type="email" value=<?php echo '"'.$_SESSION['USER_EMAIL'].'"'; ?>  required><br>
			           

			       </fieldset>
			        <fieldset id="personalData">
			            <legend>Credential elements</legend>
			           <label class="registercomponent" for="login">Login<em>*</em></label>
			            <input class="registercomponent" id="login" name ="login"  autofocus required maxlength="20" pattern="[A-Za-z-0-9]{3,20}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri" value=<?php echo '"'.$_SESSION['USER_LOGIN'].'"'; ?>><br>
			            <label class="registercomponent" for="pass">Parola<em>*</em></label>
			            <input class="registercomponent" id="pass" type="text" name="pasword" autofocus required value=<?php echo '"'.$_SESSION['USER_PASWORD'].'"'; ?>><br>
			            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>

			           <img class="registercomponent" src="Resources/captcha.php" alt="Captcha">
			 
			        </fieldset>
			        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Salveaza" href='/account'></p>
			  </form>
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