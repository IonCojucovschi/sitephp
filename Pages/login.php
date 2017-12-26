<?php
if($_POST['enter']){
echo 'se executa...';
exit();

}

Head('Login');
?>
<link rel="stylesheet" type="text/css" href="Resources/register.css">

<body>

<div class="wrapper" >

    <?php Menu();   ?>
	<!-- .header-->
    <?php  Content('<h2>Forma de inregistrare a Utilizatorilor</h2>
<form id="", method="POST" action="/login" onsubmit="return validateForm()">
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required><br>
            <label class="registercomponent" for="pass">Parola<em>*</em></label>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>


       
        <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Create New User"></p>
     </form>'); ?>
 

 </div><!--wrapper-->	

   
     
<?php  Footer(); ?>
<!-- adaogam footerul -->
</body>
</html>
