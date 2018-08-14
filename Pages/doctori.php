<?php

function Error($p1,$p2){
exit( '{"data":"'.$p1.'"," "text":"'.$p2.'"}');
}
                    ///      /page/module/Param['']/dfg
/////example for finding    /doctori/doctori/register/login.password.nume.prenume.speciallitatea

///can register doctors
if($Module=='doctori'){
///echo var_dump($Param);///verify params for this module

 if(!$Param['register']) Error(1,'fornamde inregistrare este nula utilizatorului este null');
// if(!$Param['param']) Error(2,'parametrii de identificcare este null');
$Param['register']==FormChars($Param['register']);
$Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
echo var_dump($Exp);
mysqli_query($CONNECT, "INSERT INTO `doctori` VALUES ('', '$Exp[0]', '$Exp[1]','$Exp[2]','$Exp[3]','$Exp[4]')");


}/////  /doctori/user/register/login.pasword.name.surname.phone
elseif($Module=="user"){
    ////   
     if(!$Param['register']) Error(1,'fornamde inregistrare este nula utilizatorului este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ('', '$Exp[2]', '$Exp[3]','noEml','$Exp[4]','$Exp[0]','$Exp[1]','0')");

    ///   /doctori/procedure/register/name_procedure
}elseif($Module=='procedure'){
  ///  echo var_dump($Param);////verify params 

	if(!$Param['register']) Error(1,'procedura este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `proceduri` VALUES ('', '$Exp[0]')");

    //// /doctori/programari/register/2.4.sgfsfwtwrt erwt er
}elseif($Module=='programari'){

	if(!$Param['register']) Error(1,'procedura este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `programari` VALUES ('', '$Exp[0]','$Exp[1]','$Exp[2]')");


}













// $Param['login']==FormChars($Param['login']);

// $Array= array('name','surname','id' );

// $Exp=explode('.', $Param['param']);////lincul se va transforma in array delimitatorul fiind simbolul '.'

// foreach ($Exp as $key) if($Param['param']!='all' and !in_array($key,$Array)) Error(3,'parametrii nu sunt introdusi corect');

// if($Param['param']=='all')$Select=$Array;
// else $Select=$Exp;


// foreach ($Select as $key) $SQL .="`$key`,";

// $SQL=substr($SQL,0,-1);

// ///exit($SQL);

// $qr=mysqli_fetch_assoc(mysqli_query($CONNECT, "SELECT $SQL FROM `Users` WHERE login='$Param[login]'"));

// if(!$qr)Error(4,'Nu sa putut extrage datele pentu asa login');
// echo var_dump($qr);
// echo '{"data":'.json_encode($qr,JSON_UNESCAPED_UNICODE).'}';