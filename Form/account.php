<?php

if($Module=='logout' and $_SESSION['USER_LOGIN_IN']==1){

        if($_COOKIE['user']) {
     	setcookie('user','',time()-700000,'/login');
        unset($_COOKIE['user']);
    }	
   session_unset();
  //session_destroy();

   exit( header('Location: /login'));
}

if($Module=='edit' and $_POST['enter']){

  ULogin(1);
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
    
     if(!$_POST['name'] or !$_POST['surname'] or !$_POST['email']  or !$_POST['login'] or !$_POST['pasword'] or !$_POST['captcha']) {
	   MesageSend(1,' Forma are celule goale.');
	}

    mysqli_query($CONNECT,"UPDATE `Users` SET `name`='$_POST[name]',`name`='$_POST[surname]',`Email`='$_POST[email]',`login`='$_SESSION[USER_LOGIN]',`pasword`='$_POST[pasword]' WHERE id='$_SESSION[USER_ID]'");

	$_SESSION['USER_NAME']=$_POST['name'];
	$_SESSION['USER_SURNAME']=$_POST['surname'];
	$_SESSION['USER_EMAIL']=$_POST['email'];
	$_SESSION['USER_PASWORD']=$_POST['pasword'];
	$_SESSION['USER_ACTIVE']=$_POST['login'];

    MesageSend(3,'Datele sau reinoit cu succes','/profile');
}


  ULogin(0);///pagina e pentru vizitatori


///restore password form
if($Module=='restore' and !$Param['code'] and substr($_SESSION['RESTORE'], 0,4)=='wait') MesageSend(1,'Dvs deja ati transmis cererea de restabilire a parolei. Confirmati email-ul dvs <b>'.substr($_SESSION['RESTORE'],5).'</b>','/login');
if($Module=='restore' and $_SESSION['RESTORE'] and substr($_SESSION['RESTORE'], 0,4)!='wait') MesageSend(1,'Parola dvs a fost schimbata. Pentru logare folositi noua parola. <b>'.$_SESSION['RESTORE'].'</b>','/login');



if($Module=='restore' and $_POST['enter']){
    ///echo 'restore and post enter';
	$_POST['login']==FormChars($_POST['login']);
	$_POST['captcha']==FormChars($_POST['captcha']);
	if(!$_POST['login'] and !$_POST['captcha']) MesageSend(1,' OOps forma este indeplinita gresit.');
	if($_SESSION['captcha']!=md5($_POST['captcha'])) MesageSend(1,'Codul captcha este indeplinit gresit');

	$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `id`,`Email` FROM `Users` WHERE login='$_POST[login]'"));

	if(!$Row['Email'])MesageSend(3,'Nu este utilizator cu asa date');
	////transmitem mesajul de restabilire a parolei 
	////transmitem mesajul de restabilire a parolei 
    ////there may aper eror vhen ancode apear = at last simbol ,,,,may be a bug or not 
    $Code=base64_encode($Row['id']) ;///$_POST['login'];

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
    $mail->setFrom('nu-raspunde@gmail.com', 'readAbook.md');
    $mail->addAddress($Row['Email']);     // Add a recipient
    $mail->addReplyTo('No-Reply@reaadabook.com');
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Activation Message.';
    $linq='http://readabook.16mb.com/account/restore/code/'.$Code;
    $mail->Body ='Pentru restbilirea parolei contului faceti click <a href="'.$linq.'">aici</a>';/// MailActivation($linq);
    ///cu pricoale
   $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if ($mail->Send()) {
    $_SESSION['RESTORE']='wait_'.$Row['Email'];///cream sesiunea de restabilire a parolei
    MesageSend(3,': Mesajul de restabilire a contului a fost transmis la adresa <b>'.HideEmail($Row['Email']).'</b>.'); ;
    } else {
    MesageSend(3,': Din pacate restabilirea este imposibila. Masajul de restabilire a contului nu sa transmis la adresa <b>'.HideEmail($Row['Email']).'</b>.');
    }
}

if($Module=='restore' and $Param['code']){

     ///echo 'Restore and exist params';
	//////TO DO
	$IdValue=base64_decode($Param['code']);
	$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE `id`='$IdValue'"));

	if(!$Row['login']) MesageSend(1,': Nu se poate de restabilit parola. Conectati administratorul in cazuri exceptionale.','/login');

	$Random=RandomeString(15);
	$_SESSION['RESTORE']=$Random;

	mysqli_query($CONNECT, "UPDATE `Users` SET `pasword`='$Random' WHERE login='$Row[login]'");
	MesageSend(3,'Parola este modificata cu succes.Pentru aceasta utilizati noua parola <b>'.$Random.'</b>. Daca aceasta nu va convine o puteti schimba din setarile profilului.','/login');







}


////  register form compiller 
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
	   MesageSend(1,' Forma are celule goale.');
	}

	 if(strcmp($_SESSION['captcha'],md5($_POST['captcha']))!=0){
	 	MesageSend(1,' Codul captcha este scris gresit!');
	 }

    $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE (`login`='$_POST[login]')"));

	if($Row){
		MesageSend(1,' Loginul de forma <b>'.$_POST['login'].'</b> exista deja!');
	 }
   mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '','$_POST[name]','$_POST[surname]','$_POST[email]', '$_POST[login]','$_POST[pasword]',0)");

	///transmite linkul pe emailul dat cu ajutorul SMTP
	/// cu functia data se poate transmite daca activam modului din php.ini  dar nu toate serverele sustin asa posibilitati. si + este nesigur de asta.
	///mail($_POST['email'],'Inregistrarea pe blogul readAbook.','Link-ul de activare a contului: http://readabook.16mb.com/activate/code/'.substr($Code,-5).substr($Code,0,-5),'From : cojucovschi@bk.ru');
	$Code=base64_encode($_POST['login']) ;///$_POST['login'];
	///substr(base64_encode($_POST['login']), 0,-1) ;
	require 'PHPMailer/PHPMailerAutoload.php';
	require 'credential.php';
	///require 'Components/MailBody.php';
	$mail = new PHPMailer;
	$mail->SMTPDebug = 4;       // Enable verbose debug output
	$mail->isSMTP();     // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;          // Enable SMTP authentication
	$mail->Username = EMAIL;    // SMTP username
	$mail->Password = PASS;    // SMTP password
	$mail->SMTPSecure = 'tls';    // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 587;          // TCP port to connect to
	$mail->setFrom('nu-raspunde@gmail.com', 'readAbook.md');
	$mail->addAddress($_POST['email']);     // Add a recipient
	$mail->addReplyTo('No-Reply@reaadabook.com');
	// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = 'Activation Message.';
    $linq='http://readabook.16mb.com/account/activate/code/'.$Code;
	$mail->Body ='Pentru activarea contului faceti click <a href="'.$linq.'">aici</a>';/// MailActivation($linq);
	///cu pricoale
	///substr($Code,-5).substr($Code,0,-5).'</b>';
       $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		if ($mail->Send()) {
		 MesageSend(3,': Inregistrarea sa finisat cu succes. Masajul de activare a contului a fost transmis la adresa <b>'.$_POST['email'].'</b>.'); ;
		 } else {
		 MesageSend(3,': Din pacate inregistrarea nu sa finisat. Masajul de activare nu sa transmis la adresa <b>'.$_POST['email'].'</b>.');
		 }






} elseif ($Module=='login' and $_POST['enter']){
	$_POST['login']==FormChars($_POST['login']);
	$_POST['pasword']==GenPasword(FormChars($_POST['pasword']),$_POST['login']);

    if(!$_POST['login'] or !$_POST['pasword']){
	     MesageSend(1," Nu este posibil sa fa logati cu asa date.");
    }
    $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `pasword`,`active` FROM `Users` WHERE (`login`='$_POST[login]')"));
    if($Row['pasword']!=$_POST['pasword']) MesageSend(1,"<b>Parola</b> sau <b>Loginul</b> este gresita.");
    if($Row['active']==0) MesageSend(3,"Contul nu este activ. Intrati pe posta electronica cu care vati inregistrat si accesati lincul de activare.");
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
       setcookie('user',$_POST['login'],strtotime('30 days'),'/');
    }
   MesageSend(3,' valoarea Session[userlogin]='.$_SESSION['USER_LOGIN_IN'],'/profile');
    ///exit( header('Location:/profile'));





}elseif ($Module=='activate' and $Param['code']) {/// 
	if(!$_SESSION['USER_ACTIVE_EMAIL'])
	{
		$Login= base64_decode($Param['code']);                 ///$Param['code'];
		/////substr($Param['code'],5).substr($Param['code'], 0,5);
		$Email=mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT `Email` FROM `Users`  WHERE login='$Login'"));
		if(strpos($Email['Email'],'@')!==false){
			mysqli_query($CONNECT, "UPDATE `Users` SET active=1 WHERE Email='$Email[Email]'");
			$_SESSION['USER_ACTIVE_EMAIL']=$Email['Email'];
            MesageSend(3,'Email-ul: <b>'.$Email['Email'].'</b> este confirmat.','/login');
		}else {
		    MesageSend(1,'Adresa email nu este confirmata.','/login');
		}
	}else {
		MesageSend(1,'Adresa email <b>'.$_SESSION['USER_ACTIVE_EMAIL'].' este deja confirmata </b>','/login');
	}
}


?>

