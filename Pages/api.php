<?php

function Error($p1,$p2){
exit( '{"error":"'.$p1.'"," "text":"'.$p2.'"}');

}


if($Module=='users'){
if(!$Param['login']) Error(1,'loginul utilizatorului este null');
if(!$Param['param']) Error(2,'parametrii de identificcare este null');
/////forma url    /api/users/login/ion/param/id
$Param['login']==FormChars($Param['login']);

$Array= array('name','surname','id' );

$Exp=explode('.', $Param['param']);////lincul se va transforma in array delimitatorul fiind simbolul '.'

foreach ($Exp as $key) if($Param['param']!='all' and !in_array($key,$Array)) Error(3,'parametrii nu sunt introdusi corect');


if($Param['param']=='all')$Select=$Array;
else $Select=$Exp;



foreach ($Select as $key) $SQL .="`$key`,";

$SQL=substr($SQL,0,-1);

///exit($SQL);


$qr=mysqli_query($CONNECT, "SELECT $SQL FROM `Users` WHERE login='$Param[login]'");

echo json_encode(mysqli_fetch_assoc($qr),JSON_UNESCAPED_UNICODE);














}else{
Error(0,"metoda nu este afisata!");
}



?>