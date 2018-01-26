<?php

function Error($p1,$p2){
exit( '{"error":"'.$p1.'"," "text":"'.$p2.'"}');

}

/////example for finding    /api/users/login/ion/param/id
if($Module=='users'){
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

echo json_encode($qr,JSON_UNESCAPED_UNICODE);

}elseif(){









	
}else{
Error(0,"metoda nu este afisata!");
}



?>