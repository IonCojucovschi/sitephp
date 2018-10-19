<?php
ULogin(1);
Head('Adaoga carti');
?>
<body>
<div class="wrapper" >
	  <?php Menu();  MessageShow(); TopContent();?><!-- navigation bar and top content -->
<div class="row middle" >
		<?php 
   		ShowAllCategories(); /// show all categories list 
		?>
		<div class="col-md-6 recs">
  <form class="form-group"  method="POST" action="/book/addbook" onsubmit="return validateForm()" enctype="multipart/form-data">
       <p><i>Completati urmatoarea forma.</i></p>
       <fieldset id="userData">
         <legend>Detaliile Despre Carte</legend>
            <input class="form-control"  id="title" name="title" placeholder="Titlul Cartii" autofocus required=""><br>
            <input class="form-control"  id="author" name="author" placeholder="Autorul Cartii" autofocus required><br>
            <label>Categoria</label>
            <select class="form-control"  id="category" name="category">
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
            <label>Data publicarii<em>*</em></label>
            <input class="form-control"  id="date" name="date" placeholder="date" type="date" autofocus required><br>
            <textarea class="form-control"  rows="10" cols="70" id="description" name="description" placeholder="Descrieti pe scurt continutul cartii" autofocus required  type="text"></textarea><br>

           

       </fieldset>
        <fieldset id="personalData">
            <legend>Informatie Aditionala</legend>
            <label>Selecteaza imaginea </label>
            <input class="form-control" id="image" name ="image"  type="file" autofocus required><br>
            <label>Adauga continutul cartii </label>
            <input class="form-control" id="bookcontent" type="file" name="bookcontent" autofocus required><br>
            <input class="form-control" placeholder="Introdu textul alaturat"  id="captcha" type="text" name="captcha" autofocus required>

           <img src="Resources/captcha.php" alt="Captcha">
 
        </fieldset>
            

        <p><input class="btn btn-primary" type="submit" name ="enter" value="Add New Book" href='/book'></p>
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
