<?php
if($Module=='register' and  $_POST['enter']){

//echo var_dump($_POST);


$_POST['name']==FormChars($_POST['name']);
$_POST['surname']==FormChars($_POST['surname']);
$_POST['telephone']==FormChars($_POST['telephone']);
$_POST['email']==FormChars($_POST['email']);
$_POST['faculty']==FormChars($_POST['faculty']);
$_POST['speciality']==FormChars($_POST['speciality']);
$_POST['birthDate']==FormChars($_POST['birthDate']);
$_POST['matriculationDate']==FormChars($_POST['matriculationDate']);
$_POST['gender']==FormChars($_POST['gender']);
$_POST['login']==FormChars($_POST['login']);
$_POST['pasword']==GenPas(FormChars($_POST['pasword']),$_POST['login']);
$_POST['coments']==FormChars($_POST['coments']);
$_POST['captcha']==FormChars($_POST['captcha']);


if(!$_POST['name'] or !$_POST['surname'] or !$_POST['email'] or !$_POST['faculty'] or !$_POST['speciality'] or !$_POST['birthDate'] or !$_POST['matriculationDate'] or !$_POST['gender'] or !$_POST['login'] or !$_POST['pasword'] or !$_POST['captcha']) {

MesageSend(1,'forma este indeplinita gresit');
}

if($_SESSION['captcha']!=md5($Random))
	MesageSend(1,'codul captcha este scris gresit!');




$result=mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE (`login`=='$_POST[login]')");
echo var_dump($result);




echo var_dump($_POST['pasword']);






///$Row=mysqli_fetch_assoc($result);

//verificam unicitatea loginului 
if($Row){
	echo 'Loginul de forma '.$Raw.' exista deja!';
}


mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '', '$_POST[login]','$_POST[pasword]','$_POST[name]','$_POST[surname]','$_POST[birthDate]', '$_POST[faculty]','$_POST[speciality]','$_POST[matriculationDate]','$_POST[telephone]','$_POST[coments]','.$_POST[email]','nimic','$_POST[gender]')");


// mysqli_query($CONNECT, "INSERT INTO `users` VALUES ( '', ".$_POST['login'].",".$_POST['pasword'].",".$_POST['name'].",".$_POST['surname'].",".$_POST['birthDate'].", ".$_POST['faculty'].",".$_POST['speciality'].",".$_POST['matriculationDate'].",".$_POST['telephone'].",".$_POST['coments'].",".$_POST['email'].",'nimic',".$_POST['gender'].")");

$soem=mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ( '', '$_POST[login]','$_POST[pasword]','$_POST[name]','$_POST[surname]','$_POST[birthDate]', '$_POST[faculty]','$_POST[speciality]','$_POST[matriculationDate]','$_POST[telephone]','$_POST[coments]','.$_POST[email]','nimic','$_POST[gender]')");

echo var_dump($soem);





}


?>