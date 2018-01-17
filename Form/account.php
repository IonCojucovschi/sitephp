<?php

if($Module=='logout' and $_SESSION['USER_ACTIVE_EMAIL']==1){

if($_COOKIE['user']) {setcookie('user','',time()-700000,'/');
unset($_COOKIE['user']);}	

session_unset();
$_SESSION = array();
session_destroy();

exit( header('Location: /login'));
}



ULogin(0);///pagina e pentru vizitatori
if($Module=='register' and  $_POST['enter']){

// echo var_dump($_POST);

$_POST['name']==FormChars($_POST['name']);
$_POST['surname']==FormChars($_POST['surname']);



//$_POST['telephone']==FormChars($_POST['telephone']);
$_POST['email']==FormChars($_POST['email']);
//$_POST['faculty']==FormChars($_POST['faculty']);
//$_POST['speciality']==FormChars($_POST['speciality']);
//$_POST['birthDate']==FormChars($_POST['birthDate']);
//$_POST['matriculationDate']==FormChars($_POST['matriculationDate']);
//$_POST['gender']==FormChars($_POST['gender']);


$_POST['login']==FormChars($_POST['login']);
$_POST['pasword']==FormChars($_POST['pasword']);
$_POST['pasword']==GenPasword($_POST['pasword'],$_POST['login']);



//$_POST['coments']==FormChars($_POST['coments']);
$_POST['captcha']==FormChars($_POST['captcha']);


/////MUST BE PUTTED IN VERIFICATION BY NULL ELEMENTS 
//     !$_POST['email'] or !$_POST['faculty'] or !$_POST['speciality'] or !$_POST['birthDate'] or !$_POST['matriculationDate'] or !$_POST['gender'] or 


 if(!$_POST['name'] or !$_POST['surname'] or !$_POST['email']  or !$_POST['login'] or !$_POST['pasword'] or !$_POST['captcha']) {
// //echo var_dump($_SESSION);
///['captcha'];
///echo md5($Random);   //scopul este de a verifica criptarea numarului daca este corecta..
   MesageSend(1,' Forma are celule goale.');
}


//echo strcmp($_SESSION['captcha'],md5($_POST['captcha']));

 if(strcmp($_SESSION['captcha'],md5($_POST['captcha']))!=0){
 	MesageSend(1,' Codul captcha este scris gresit!');
}

 $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE (`login`='$_POST[login]')"));
 //echo var_dump($Row);
// //verificam unicitatea loginului 
if($Row){
	MesageSend(1,' Loginul de forma <b>'.$_POST['login'].'</b> exista deja!');
 }


 mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '','$_POST[name]','$_POST[surname]','$_POST[email]', '$_POST[login]','$_POST[pasword]',0)");





///transmite linkul pe emailul dat cu ajutorul SMTP

// require_once "Mail.php";

// $from = "Cojucovschi Ion <readabook@gmail.com>";
// $to = $_POST['name'].' '.$_POST['surname'].'<'.$_POST['Email'].'>';
// $subject = "Hi!";
// $body = "Hi,\n\nHow are you?";

// $host = "mail.ru";
// $username = "cojucovschi@mail.ru";
// $password = "4ion1994";

// $headers = array ('From' => $from,
//   'To' => $to,
//   'Subject' => $subject);
// $smtp = Mail::factory('smtp',
//   array ('host' => $host,
//     'auth' => true,
//     'username' => $username,
//     'password' => $password));

// $mail = $smtp->send($to, $headers, $body);

// if (PEAR::isError($mail)) {
//   echo("<p>" . $mail->getMessage() . "</p>");
//  } else {
//   echo("<p>Message successfully sent!</p>");
//  }


///cu confirmarea mail treb de mai vazut ,,,nu se transmite pe posta poate tre de schimbat alta functie,,, o sa vedem ce facem....

$Code=$_POST['login'];

mail($_POST['email'],'Inregistrarea pe blogul readAbook.',
'Link-ul de activare a contului: http//readabook.esy.es/activate/code/'.substr($Code,-5).substr($Code,0,-5),'From : cojucovschi@bk.ru');
MesageSend(3,': Inregistrarea sa finisat cu succes. Masajul de activare a contului a fost transmis la adresa <b>'.$_POST['email'].'</b>.');



}else if ($Module=='activate' and $Param['code']) {
	if(!$_SESSION['USER_ACTIVE_EMAIL'])
	{
		$Email=substr($Param['code'],5).substr($Param['code'], 0,5);
		if(strpos($Email,'@')!==false){
			mysqli_query($CONNECT, "UPDATE `Users` SET `active`='1' WHERE `Email`='$Email'");

			$_SESSION['USER_ACTIVE_EMAIL']=$Email;
            MesageSend(3,'Email-ul: <b>'.$Email.'</b> este confirmat.','/login');
		}else MesageSend(1,'Adresa email nu este confirmata.','/login');
	}else MesageSend(1,'Adresa emai <b>'.$_SESSION['USER_ACTIVE_EMAIL'].' este deja confirmata </b>','/login');


}else if ($Module=='login' and $_POST['enter']){

$_POST['login']==FormChars($_POST['login']);
$_POST['pasword']==GenPasword(FormChars($_POST['pasword']),$_POST['login']);


if(!$_POST['login'] or !$_POST['pasword']){

	MesageSend(1," Nu este posibil sa fa logati cu asa date.");
}

 $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `pasword`,`active` FROM `Users` WHERE (`login`='$_POST[login]')"));

if($Row['pasword']!=$_POST['pasword']) MesageSend(1,"<b>Parola</b> sau <b>Loginul</b> este gresita.");

if($Row['active']==0) MesageSend(3,"Contul nu este activ. Intrati pe posta electronica cu care cati inregistrat si accesati lincul de activare.");

$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `id`,`name`,`surname`,`Email`,`login`,`pasword`,`active` FROM `Users` WHERE (`login`='$_POST[login]')"));

$_SESSION['USER_ID']=$Row['id'];
$_SESSION['USER_NAME']=$Row['name'];
$_SESSION['USER_SURNAME']=$Row['surname'];
$_SESSION['USER_EMAIL']=$Row['Email'];
$_SESSION['USER_LOGIN']=$Row['login'];
$_SESSION['USER_PASWORD']=$Row['pasword'];
$_SESSION['USER_ACTIVE']=$Row['active'];
$_SESSION['USER_LOGIN_IN']=1;

if($_REQUEST['remember']){
setcookie('user',$_POST['pasword'],strtotime('30 days'),'/');

}

exit( header('Location:/profile'));



}




?>
