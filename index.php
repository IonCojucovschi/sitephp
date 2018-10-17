<?php

include_once 'setting.php';



session_start();

$CONNECT=mysqli_connect(HOST,USER,PASS,DB);/////create connection to data base



if($_SESSION['USER_LOGIN_IN']==1 and $_COOKIE['user']){



$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `id`,`name`,`surname`,`Email`,`login`,`pasword`,`active` FROM `Users` WHERE (`login`='$_COOKIE[user]')"));



$_SESSION['USER_ID']=$Row['id'];

$_SESSION['USER_NAME']=$Row['name'];

$_SESSION['USER_SURNAME']=$Row['surname'];

$_SESSION['USER_EMAIL']=$Row['Email'];

$_SESSION['USER_LOGIN']=$Row['login'];

$_SESSION['USER_PASWORD']=$Row['pasword'];

$_SESSION['USER_ACTIVE']=$Row['active'];

$_SESSION['USER_LOGIN_IN']=1;



}









if($_SERVER['REQUEST_URI']=='/'){

$Page='index';

$Module='index';

}else{



$URL_Path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);

$URL_Parts=explode('/', trim($URL_Path,'/'));

$Page=array_shift($URL_Parts);

$Module=array_shift($URL_Parts);





if(!empty($Module)){

	$Param=array();

	for($i=0;$i<count($URL_Parts);$i++){

		$Param[$URL_Parts[$i]]=$URL_Parts[++$i];

	}

}



}

if($Page=='index') include('Pages/index.php');

else if($Page=='login') include('Pages/login.php');

else if($Page=='register') include('Pages/register.php');

else if($Page=='account') include('Form/account.php');

else if($Page=='addbook') include('Pages/addbook.php');

else if($Page=='book') include('Form/book.php');

else if($Page=='profile') include('Pages/profile.php');

else if($Page=='api') include('Pages/api.php');

else if($Page=='restore') include('Pages/restore.php');

else if($Page=='viewbook') include('Pages/viewbook.php');

else if($Page=='userbox') include('Pages/userbox.php');

else if($Page=='bookscategory') include('Pages/booksCategory.php');

else if($Page=='doctori') include('Pages/doctori.php'); 

function ULogin($p1){

if($p1<=0 and $_SESSION['USER_LOGIN_IN']!=$p1) MesageSend(1,'Pagina data este disponibila doar pentru vizitatori.','/');
else if ($_SESSION['USER_LOGIN_IN']!=$p1) MesageSend(1,'Pagina data este disponibila doar pentru utilizatori.','/');

}















function MesageSend($p1,$p2,$p3=''){

if($p1==1) $p1='Eroaere';

else if($p1==2) $p1='Hint';

else if ($p1==3) $p1='Informatie';



if($p3) $_SERVER['HTTP_REFERER']=$p3;



$_SESSION['message']='<div class="MessageBlock"><b>'.$p1.'</b>'.$p2.'</div>';

$server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "/";

exit(header('Location:'.$server));

}



function MessageShow(){

if($_SESSION['message']) $Message=$_SESSION['message'];

echo $Message;

$_SESSION['message']= array();



}













  ///fist param is password, last is login

  ///pentru fiecare combinatie de log si pasw se creaza o parola criptata.

function GenPasword($p1,$p2){

    $codedpassword=md5(md5($p1).md5($p2));

  return $codedpassword;///'read'.md5('123'.$p1.'321').md5('123'.$p2.'321')



}



///regulate chars

function FormChars($p1){

return nl2br(htmlspecialchars(trim($p1),ENT_QUOTES),false);

}







//// form for complet content



function Head($p1){



  echo '<!DOCTYPE html><html><head>	<meta charset="utf-8" />
			  <title>'.$p1.'</title>
				  <meta name="keywords" content="" />	<meta name="description" content="" />
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  	<link type="text/css" href="../Resources/style.css" rel="stylesheet" ></head>';

}



function Menu(){



   if($_SESSION['USER_LOGIN_IN']!=1) 

	   $Menu='
	   <li>
	   <a  href="/register" class="link">Inregistrare</a>	
		</li>
	   <li>
	  		 <a href="/login"  class="link">Logare</a>
		</li>
			<li>
				<a  href="/restore" class="link">Restabilire Parola</a>	
			</li>  ';

	else $Menu='
	
	<li>
	<a  href="/addbook" class="link">Adauga Carti</a>
			
	</li>
	
	<li>
	  <a  href="/profile" class="link">Profil</a>
			
	</li>
	
	<li>
	  <a  href="/userbox" class="link">Vreau sa Citesc</a>
			
	</li>
	
	<li>
	<a  href="/account/logout" class="link , logout">Iesi</a>
	</li>';


	echo '<div class="nav">
           <ul id="navbar">
			<li>
			<button id="buttonMenu" class="link"></button>
			</li>
		  
			<li>
			  <a href="/" class="link">Acasa</a>				
			</li>
			
          '.$Menu.'         
         </ul>
	</div>';

}





function Footer(){



echo ' <footer class="footer">

	ReadAbook COMME SOON!!!

</footer>' ;



}



function Content($p1){



	echo '<div class="middle">



		<div class="container">

			<main class="content">

				'.$p1.'

			</main><!-- .content -->

		</div><!-- .container-->



		



	</div><!-- .middle-->';

}

function BookFoorm($book_name,$image_link,$download_link,$detail_link){

////book name is not showed '.$book_name.'

	echo '

	<li style=" margin:10px; float: left;">

	<div class="book_wrapper">
     <img class="book_image" src="'.$image_link.'" />
	<div class="book_name"></div>
   	<a class="details" name ="enter" href="'.$detail_link.'" action="/viewbook/viewbook">Vezi</a>
   	<a  class="details" href="'.$download_link.'">Descarca</a>
 	</div></li>';

}





///function for know how many books we hawe in data base

function BookNumber($p1=''){



	if($p1==''){

	 $result= mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT  COUNT(id) FROM  `books` WHERE 1==1"));

	echo $result;

	}else{

		$result=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT COUNT(id) FROM `books` WHERE category='$p1'"));

	     echo $result;

	}

}




/////Helper function for worck

function RandomeString($p1){

  $Char='1234567890qwertyyuioplkjhgfdsazxcvbnm';

  for($i=0;$i<$p1;$i++) $String.=$Char[rand(0,strlen($Char)-1)];

  	return $String;



}



function HideEmail($p1){

$Explode=explode('@', $p1);

return $Explode[0].'@'.'xxxxxx';

}





function ShowAllCategories()

{

	global $CONNECT;

    $qrii=mysqli_query($CONNECT, "SELECT DISTINCT `category` , count(`id`) as quantity  FROM `books` GROUP BY `category`");



		$showCategory='
		<div class="col-md-3 category">
		<div class="title">Categorii</div>
		<ul class="categ">';

	    if($qrii)

	     {

	     	while($bo = mysqli_fetch_assoc($qrii)) {

			 $showCategory.='<li>
					 <a style="color=#ffffff;" 
						href="/bookscategory/category/name/'.$bo['category'].'">'.$bo['category']."    (".$bo['quantity'].')
						</a>
					</li><hr/>';

	        }

	     }

	    $showCategory.='</ul></div>';



	    echo $showCategory;



}







?>