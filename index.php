<?php
include_once 'setting.php';

session_start();
$CONNECT=mysqli_connect(HOST,USER,PASS,DB);/////create connection to data base

if($_SESSION['USER_LOGIN_IN']!=1 and $_COOKIE['user']){

$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `id`,`name`,`surname`,`Email`,`login`,`pasword`,`active` FROM `Users` WHERE (`pasword`='$_COOKIE[user]"));

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
$server = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "";
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

  echo '<!DOCTYPE html><html><head>	<meta charset="utf-8" /><title>'.$p1.'</title>	<meta name="keywords" content="" />	<meta name="description" content="" />	<link href="../Resources/style.css" rel="stylesheet"></head>';
}

function Menu(){

   if($_SESSION['USER_LOGIN_IN']!=1) 
   	$Menu='<a  href="/register" class="menu">Register</a>	
          <a href="/login"  class="menu">Login</a>';
    else $Menu='<a  href="/addbook" class="menu">Add Books</a>
      	<a  href="/profile" class="menu">Profil</a>
      	<a  href="/account/logout" class="menu , logout">Iesi</a>';

      	// 		<form method="POST" action="account/logout"> <p><input style="background:#68bb54; padding: 10px; border-radius: 5px;" type="submit" name ="enter" value="Log in"></p>
    			// </form>

	echo '<header class="header">
		<div style="padding-top: 120px;">
		  <a href="/" class="menu">HOME</a>	
          '.$Menu.'          
	</header>';
}


function Footer(){

echo ' <footer class="footer">
	ReadAboock : every dey is mor beautifull with me!!!!
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

	echo '<div class="book_wrapper"
       style="background-image:url("'.$image_link.'");">
	<div class="book_name">'.$book_name.'</div>
   	<button type="submit" class="details">
   	<a href="'.$detail_link.'">Detail</a>
   	</button>
	<button type="submit" class="download">
	<a href="'.$download_link.'">Download</a>
	</button>

</div>';
}




?>