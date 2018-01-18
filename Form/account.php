<?php

if($Module=='logout' and $_SESSION['USER_ACTIVE_EMAIL']==1){

if($_COOKIE['user']) {setcookie('user','',time()-700000,'/');
unset($_COOKIE['user']);}	

session_unset();
//session_destroy();

exit( header('Location: /login'));
}


elseif($Module=='register' and  $_POST['enter']){
ULogin(0);///pagina e pentru vizitatori
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
   MesageSend(1,' Forma are celule goale.');
}


//echo strcmp($_SESSION['captcha'],md5($_POST['captcha']));

 if(strcmp($_SESSION['captcha'],md5($_POST['captcha']))!=0){
 	MesageSend(1,' Codul captcha este scris gresit!');
}

 $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE (`login`='$_POST[login]')"));

if($Row){
	MesageSend(1,' Loginul de forma <b>'.$_POST['login'].'</b> exista deja!');
 }


 mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '','$_POST[name]','$_POST[surname]','$_POST[email]', '$_POST[login]','$_POST[pasword]',0)");





///transmite linkul pe emailul dat cu ajutorul SMTP

$Code=$_POST['email'];
/// cu functia data se poate transmite daca activam modului din php.ini  dar nu toate serverele sustin asa posibilitati. si + este nesigur de asta.
///mail($_POST['email'],'Inregistrarea pe blogul readAbook.','Link-ul de activare a contului: http://readabook.16mb.com/activate/code/'.substr($Code,-5).substr($Code,0,-5),'From : cojucovschi@bk.ru');


require 'PHPMailer/PHPMailerAutoload.php';
require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;       // Enable verbose debug output

$mail->isSMTP();     // Set mailer to use SMTP

$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers

$mail->SMTPAuth = true;          // Enable SMTP authentication

$mail->Username = EMAIL;    // SMTP username

$mail->Password = PASS;    // SMTP password

$mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted

$mail->Port = 587;          // TCP port to connect to



$mail->setFrom(EMAIL, 'readAbook.md');
$mail->addAddress($_POST['email']);     // Add a recipient
$mail->addReplyTo('No-Reply@reaadabook.com');


// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->isHTML(true);                                  // Set email format to HTML



$mail->Subject = 'Here is the subject';

$mail->Body    = '<b>http://readabook.16mb.com/activate/code/'.substr($Code,-5).substr($Code,0,-5).'</b>';

$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if ($mail->Send()) {
 MesageSend(3,': Inregistrarea sa finisat cu succes. Masajul de activare a contului a fost transmis la adresa <b>'.$_POST['email'].'</b>.'); ;
 } else {
 MesageSend(3,': Din pacate inregistrarea nu sa finisat. Masajul de activare nu sa transmis la adresa <b>'.$_POST['email'].'</b>.');
 }


}elseif ($Module=='activate' and $Param['code']) {
	if(!$_SESSION['USER_ACTIVE_EMAIL'])
	{
		$Email=substr($Param['code'],5).substr($Param['code'], 0,5);
		MesageSend(3,'Email-ul: <b>'.$Email.'</b> este confirmat.','/login');
		// if(strpos($Email,'@')!==false){
		// 	mysqli_query($CONNECT, "UPDATE `Users` SET `active`='1' WHERE `Email`='$Email'");

		// 	$_SESSION['USER_ACTIVE_EMAIL']=$Email;
  //           MesageSend(3,'Email-ul: <b>'.$Email.'</b> este confirmat.','/login');
		// }else MesageSend(1,'Adresa email nu este confirmata.','/login');
	}else MesageSend(1,'Adresa emai <b>'.$_SESSION['USER_ACTIVE_EMAIL'].' este deja confirmata </b>','/login');


} elseif ($Module=='login' and $_POST['enter']){

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
