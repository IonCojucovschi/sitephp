<?php
ULogin(0);///pagina e pentru vizit
Head('Login');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">

<body>
<div class="wrapper_all">
<div class="wrapper" >

    <?php Menu();   ?>
	<!-- .header-->
    <?php  Content('<h2>Forma de inregistrare a Utilizatorilor</h2>'.MessageShow().'
<form id="", method="POST" action="account/login" onsubmit="return validateForm()">
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
            <label class="registercomponent" for="pass">Parola<em>*</em></label>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>
            <input class="registercomponent" id="remember" type="checkbox" name="remember"> Retineti contul <br>

       
        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Log in"></p>
     </form>'); ?>
 

 </div><!--wrapper-->	

   
     
<?php  Footer(); ?>
<!-- adaogam footerul -->

</div>
</body>
</html>
