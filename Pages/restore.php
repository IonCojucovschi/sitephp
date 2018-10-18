<?php
ULogin(0);///pagina e pentru vizit
Head('Restabilire parola');
?>

<body>
<div class="wrapper" >
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
    <h2>Logation Form</h2> <?php MessageShow(); ?>
    <form id="", method="POST" action="/account/restore" onsubmit="return validateForm()">
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
            
            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>
           <img class="registercomponent" src="Resources/captcha.php" alt="Captcha">
       
        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Restabileste"></p>
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
