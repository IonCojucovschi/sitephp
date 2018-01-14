<?php
if($Module=='register' and  $_POST['enter']){

// echo var_dump($_POST);

$_POST['name']==FormChars($_POST['name']);
$_POST['surname']==FormChars($_POST['surname']);



//$_POST['telephone']==FormChars($_POST['telephone']);
//$_POST['email']==FormChars($_POST['email']);
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


 if(!$_POST['name'] or !$_POST['surname'] or !$_POST['login'] or !$_POST['pasword'] or !$_POST['captcha']) {
// //echo var_dump($_SESSION);
///['captcha'];
///echo md5($Random);   //scopul este de a verifica criptarea numarului daca este corecta..
   MesageSend(1,'forma este indeplinita gresit');
}


//echo strcmp($_SESSION['captcha'],md5($_POST['captcha']));

 if(strcmp($_SESSION['captcha'],md5($_POST['captcha']))!=0){
 	MesageSend(1,' codul captcha este scris gresit!');
}

 $Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE (`login`='$_POST[login]')"));
 //echo var_dump($Row);
// //verificam unicitatea loginului 
if($Row){
	echo 'Loginul de forma '.$_POST['login'].' exista deja!';
 }


 mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '','$_POST[name]','$_POST[surname]', '$_POST[login]','$_POST[pasword]')");



//////////       FULL QUERY       ///////////////
// mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '', '$_POST[login]','$_POST[pasword]','$_POST[name]','$_POST[surname]','$_POST[birthDate]', '$_POST[faculty]','$_POST[speciality]','$_POST[matriculationDate]','$_POST[telephone]','$_POST[coments]','.$_POST[email]','nimic','$_POST[gender]')");


// // mysqli_query($CONNECT, "INSERT INTO `users` VALUES ( '', ".$_POST['login'].",".$_POST['pasword'].",".$_POST['name'].",".$_POST['surname'].",".$_POST['birthDate'].", ".$_POST['faculty'].",".$_POST['speciality'].",".$_POST['matriculationDate'].",".$_POST['telephone'].",".$_POST['coments'].",".$_POST['email'].",'nimic',".$_POST['gender'].")");

// $soem=mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '', '$_POST[login]','$_POST[pasword]','$_POST[name]','$_POST[surname]','$_POST[birthDate]', '$_POST[faculty]','$_POST[speciality]','$_POST[matriculationDate]','$_POST[telephone]','$_POST[coments]','.$_POST[email]','nimic','$_POST[gender]')");

echo 'ok';


//exit;


}

?>
