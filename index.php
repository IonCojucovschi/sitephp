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
				    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
					<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
					<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
				  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<link type="text/css" href="../../../Resources/style.css" rel="stylesheet" >
	<script href="../Resources/script.js"></script>
	  </head>';

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
// <li>
// 		    <div class="search">Cauta</div>
// 		</li>
////we add there header
	echo '
	<div class="header">
     <ul id="brand">
	    <li>
		   <img  id="logoImg" src="https://cdn.icon-icons.com/icons2/390/PNG/512/open-book_38991.png"   />
		</li>
	    <li>
		   <div class="logo">ReadABook</div>
		</li>
	    
	 </ul>

	</div>
	
	<div class="nav">
           <ul id="navbar">
			<li>
			  <a href="/" class="link">Acasa</a>				
			</li>
			
          '.$Menu.'         
         </ul>
	</div>';

}

function TopContent()
{

echo '
	<div class="top">
		<ul id="main">
			<li>
				<a href="new"></a>
			</li>
			<img id="new" src="https://www.helperhelper.com/wp-content/uploads/2015/10/bigstock-Stack-Of-Books-70033240.jpg">
			<li>
				<a href="best"></a>
			</li>
			<img id="best" src="https://cmkt-image-prd.global.ssl.fastly.net/0.1.0/ps/279888/1360/900/m1/fpnw/wm1/jhgtmbe2asdop4la4pprhgnapb7ry0a0oobq3lve4skeufnmw9ngeus2h08kxoo2-.jpg?1419244216&s=ed78544680e179b93db67115bd9cbb48">
		</ul>
	</div>';

}

function BestBooks(){

	if($_SESSION['USER_LOGIN_IN'])
	{
		$result='<div class="col-md-2 best10">
		<div class="title">Top Carti</div>
		<ul style="list-style-type: none;">
		<li>
		  <img id="short"  src="http://www.sollasbooks.com/wp-content/gallery/thin-twin-red-square/thin-twin-red.jpg">
		</li>
		</ul></div>';

	//    while ($row=mysqli_fetch_array(mysqli_query($CONNECT,"SELECT `id`,`title`,`download_linq`,`image_linq` FROM `books`"))) {
	// 	   $result+='
	// 	   <li class="book">
	// 		<img class="bookImg" data-toggle="collapse"   src="'.str_replace(" ",".DIRECTORY_SEPARATOR",$row['image_linq']).'" data-target="#bookid'.$row['id'].'"/>
	// 	    <div class="book_name collapse" id="bookid'.$row['id'].'">"'.$row['title'].'"</div>
	// 		<div><a class="buttonBook" name ="enter" href="/viewbook/viewbook/detail/'.$row['id'].'" action="/viewbook/viewbook">Vezi</a><a  class="buttonBook" href="'.$row['download_linq'].'">Descarca</a></div>   	
	// 	   </li>';	       
	// 	}
	// 	$result+='</ul></div>';
		echo $result;
	}else
	{	
			echo '	<div class="col-md-2 best10"><!-- best Views -->
	        <div class="title">Log in:</div>
              '.MessageShow().'
		<form id="short" class="form-group" method="POST" action="/account/login" onsubmit="return validateForm()">
				<input placeholder="login" class="form-control"  id="login" name ="login"  autofocus required pattern="[A-Za-z-0-9]{3,10}" title="Trebuie sa fie cuprins intre 3 si 10 simboluri"><br>
				<input placeholder="password" class="form-control"  id="pass" type="password" name="pasword" autofocus required><br>
				<input class="form-check-input" id="remember" type="checkbox" name="remember"> Retineti contul <br>
			<p><input class="btn btn-primary" type="submit" name ="enter" href="/account" value="Log in"></p>
		</form>
     </div>';
	
	}
}

function BookFoorm($book_name,$image_link,$download_link,$detail_link,$id){
////book name is not showed '.$book_name.'
	echo '
	<li class="book" >
     <img class="bookImg" data-toggle="collapse"   src="'.$image_link.'" data-target="#bookid'.$id.'"/>
	<div class="book_name collapse" id="bookid'.$id.'">"'.$book_name.'"</div>
   	<div><a class="buttonBook" name ="enter" href="'.$detail_link.'" action="/viewbook/viewbook">Vezi</a><a  class="buttonBook" href="'.$download_link.'">Descarca</a></div>   	
    </li>';

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