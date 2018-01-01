<?php
include_once 'setting.php';

session_start();
$CONNECT=mysqli_connect(HOST,USER,PASS,DB);
if($CONNECT){
////echo 'ok';
}else{
	echo 'error';
}



if($_SERVER['REQUEST_URI']=='/'){
$Page='index';
$Module='index';
}else{

$URL_Path=parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
$URL_Parts=explode('/', trim($URL_Path,'/'));
$Page=array_shift($URL_Parts);
$Module=array_shift($URL_Parts);


if(empty($Module)){
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








function MesageSend($p1,$p2){
if($p1==1) $p1='Eroaere';
else if($p1==2) $p1='Hint';
else if ($p1==3) $p1='Informatie';

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


function FormChars($p1){

return nl2br(htmlspecialchars(trim($p1),ENT_QUOTES),false);

}


function Head($p1){

  echo '<!DOCTYPE html><html><head>	<meta charset="utf-8" /><title>'.$p1.'</title>	<meta name="keywords" content="" />	<meta name="description" content="" />	<link href="../Resources/style.css" rel="stylesheet"></head>';
}

function Menu(){
	echo '<header class="header">
		<div style="padding-top: 120px;">
		  <a href="/" class="menu">HOME</a>	
          <a  href="/register" class="menu">Register</a>	
          <a href="/login"  class="menu">Login</a>	
          <div class="menu">menu</div>	
        </div>
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



?>