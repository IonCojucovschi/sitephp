<?php

function Error($p1,$p2){
exit( '{"error":"'.$p1.'"," "text":"'.$p2.'"}');

}

/////example for finding    /api/users/login/ion/param/id
if($Module=='users'){
///echo var_dump($Param);///verify params for this module

if(!$Param['login']) Error(1,'loginul utilizatorului este null');
if(!$Param['param']) Error(2,'parametrii de identificcare este null');
$Param['login']==FormChars($Param['login']);

$Array= array('name','surname','id' );

$Exp=explode('.', $Param['param']);////lincul se va transforma in array delimitatorul fiind simbolul '.'

foreach ($Exp as $key) if($Param['param']!='all' and !in_array($key,$Array)) Error(3,'parametrii nu sunt introdusi corect');


if($Param['param']=='all')$Select=$Array;
else $Select=$Exp;



foreach ($Select as $key) $SQL .="`$key`,";

$SQL=substr($SQL,0,-1);

///exit($SQL);


$qr=mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT $SQL FROM `Users` WHERE login='$Param[login]'"));

if(!$qr)Error(4,'Nu sa putut extrage datele pentu asa login');
echo var_dump($qr);
echo '{data:'.json_encode($qr,JSON_UNESCAPED_UNICODE).'}';

}elseif($Module=='login'){
  ///  echo var_dump($Param);////verify params 
	if(!$Param['login']) Error(1,'loginul utilizatorului este null');
	if(!$Param['password']) Error(2,'parametrii de identificcare este null');
	$Param['login']==FormChars($Param['login']);

	$Param['password']==FormChars($Param['password']);


	$qr=mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT * FROM `Users` WHERE login='$Param[login]' AND pasword='$Param[password]'"));

	if(!$qr)Error(4,'Nu sa putut extrage datele pentu asa format de logare.');

	echo '{data:'.json_encode($qr,JSON_UNESCAPED_UNICODE).'}';





}elseif($Module=='books' and $Param['category']){
///echo var_dump($Param);

     $qr=mysqli_query($CONNECT, "SELECT * FROM `books` WHERE category='$Param[category]'");

	if(!$qr)Error(4,'Nu sa putut extrage datele pentu asa categorie.');
     ///echo var_dump($qr);
     $alldata='{data:';

     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
     	$alldata.=json_encode($bo,JSON_UNESCAPED_UNICODE);
     }
	 $alldata.='}';

	echo $alldata;



	
}else{
Error(0,"metoda nu este afisata!");
}



?>