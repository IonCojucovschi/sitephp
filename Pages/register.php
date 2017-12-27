
<?php
Head('Inregistrare');
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
  <h2>Forma de inregistrare a Utilizatorilor</h2><hr class="hr1">
  <div class=formUser>
  <form class="register" id="", method="POST" action="/account/register" onsubmit="return validateForm()">
       <p><i>Completati urmatoarea forma.</i></p>
       <fieldset id="userData">
         <legend>Detaliile Utilizatorului</legend>
            <label  class="registercomponent"  for="name">Name <em>*</em></label>
            <input class="registercomponent"  id="name" name="name" placeholder="Jane" autofocus required=""><br>
            <label class="registercomponent" for="surname">Surname <em>*</em></label>
            <input class="registercomponent"  id="surname" name="surname" placeholder="Smith" autofocus required><br>
            <label class="registercomponent" for="telephone">Telephone</label>
            <input class="registercomponent"  id="telephone" name="telephone" placeholder="(xxx) xxx-xxxx"><br>
            <label class="registercomponent"  for="email">Email <em>*</em></label>
            <input class="registercomponent"  id="email" name="email" type="email" required><br>
             <label class="registercomponent" for="faculty">Facultatea <em>*</em></label>
            <input class="registercomponent" id="faculty" name="faculty" autofocus required><br>
            <label class="registercomponent" for="speciality">Specialitatea <em>*</em></label>
            <input class="registercomponent" id="speciality" name ="speciality" AUTOFOCUS required><br>

       </fieldset>
        <fieldset id="personalData">
            <legend>Informatia Personala</legend>

            <label class="registercomponent" for="birthDate">Birth Date<em>*</em></label>
            <input class="registercomponent" id="birthDate" name="birthDate" type="date" required><br>
            <label class="registercomponent" for="matriculationDate">Anul Inmatricularii<em>*</em></label>
            <input class="registercomponent" id="matriculationDate" name="matriculationDate" type="date" required><br>
            <label class="registercomponent" for="gender">Gen</label>
            <select class="registercomponent" id="gender" name="gender">
            	<option value="none">None</option>
                <option value="female">Feminin</option>
                <option value="male">Masculin</option>
            </select><br>
           <label class="registercomponent" for="login">Login<em>*</em></label>
            <input class="registercomponent" id="login" name ="login"  autofocus required><br>
            <label class="registercomponent" for="pass">Parola<em>*</em></label>
            <input class="registercomponent" id="pass" type="password" name="pasword" autofocus required><br>



            <label class="registercomponent" for="comments">Unde ai auzit despre UST?<em>*</em></label>
            <textarea class="registercomponent" id="comments" name="comments"  autofocus required></textarea><br>



            <input class="registercomponent" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="pasword" autofocus required>
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
