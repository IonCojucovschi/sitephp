<?php
ULogin(0);///pagina e pentru vizit
Head('Logare');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">

<body>
    <div id="left-sidebar">
        <?php 
   
        ShowAllCategories(); 
        ?>
        
        </div><!-- .left-sidebar -->
<div id="wrapper" >

    <?php Menu();   ?>
	<!-- .header-->
    <?php  Content('<h2>Logation Form</h2>'.MessageShow().'
     <form id="", method="POST" action="/account/login" onsubmit="return validateForm()">
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required maxlength="10" pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
            <label class="registercomponent" for="pass">Parola<em>*</em></label>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>
            <input class="registercomponent" id="remember" type="checkbox" name="remember"> Retineti contul <br>

       
        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" href="/account" value="Log in"></p>
     </form>'); ?>
 

     
<?php  Footer(); ?>
<!-- adaogam footerul -->
 </div><!--wrapper-->	

   

<script type="text/javascript" src="../Resources/jquery.js"></script>
<script type="text/javascript" src="../Resources/script.js"></script>
</body>
</html>
