<?php

function Error($p1,$p2){
exit( '{"data":"'.$p1.'"," "text":"'.$p2.'"}');
}
                    ///      /page/module/Param['']/dfg
/////example for finding    /doctori/doctori/register/login.password.nume.prenume.speciallitatea

///can register doctors
if($Module=='doctori' and $Param['register']){
///echo var_dump($Param);///verify params for this module

 if(!$Param['register']) Error(1,'fornamde inregistrare este nula utilizatorului este null');
// if(!$Param['param']) Error(2,'parametrii de identificcare este null');
$Param['register']==FormChars($Param['register']);
$Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
/// echo var_dump($Exp);
mysqli_query($CONNECT, "INSERT INTO `doctori` VALUES ('', '$Exp[0]', '$Exp[1]','$Exp[2]','$Exp[3]','$Exp[4]')");


////   /doctori/doctori/all/some
}elseif($Module=='doctori' and $Param['all']){
    if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);

   $qr=mysqli_query($CONNECT, "SELECT * FROM `doctori`");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;

///  /doctori/doctori/getbyid/23
}elseif($Module=='doctori' and $Param['getbyid']){
    if(!$Param['getbyid']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['getbyid']==FormChars($Param['getbyid']);
    $Exp=explode('.', $Param['getbyid']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    ///echo var_dump($Exp);

 $qr=mysqli_query($CONNECT, "SELECT * FROM `doctori` WHERE login='$Exp[0]' and password='$Exp[1]'");
   if(!$qr)Error(4,'Nu sa putut extrage asa date.');
    //echo var_dump($qr);
 echo '{"data":['.json_encode(mysqli_fetch_assoc($qr),JSON_UNESCAPED_UNICODE).']}';


}/////  /doctori/user/register/login.pasword.name.surname.phone
elseif($Module=="user" and $Param['register']){
    ////   
     if(!$Param['register']) Error(1,'fornamde inregistrare este nula utilizatorului este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `Users` VALUES ('', '$Exp[2]', '$Exp[3]','noEml','$Exp[4]','$Exp[0]','$Exp[1]','0')");




///////   /doctori/user/all/sasad
}elseif($Module=='user' and $Param['all']){
    if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);

   $qr=mysqli_query($CONNECT, "SELECT * FROM `Users` WHERE `active`=0 ");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;

////    /doctori/user/getbyid/login.password
}elseif($Module=='user' and $Param['getbyid']){
    if(!$Param['getbyid']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['getbyid']==FormChars($Param['getbyid']);
    $Exp=explode('.', $Param['getbyid']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);

 $qr=mysqli_query($CONNECT, "SELECT * FROM `Users` WHERE login='$Exp[0]' and pasword='$Exp[1]'");
   if(!$qr)Error(4,'Nu sa putut extrage asa date.');
    //echo var_dump($qr);
 echo '{"data":['.json_encode(mysqli_fetch_assoc($qr),JSON_UNESCAPED_UNICODE).']}';


    ///   /doctori/procedure/register/name_procedure
}elseif($Module=='procedure' and $Param['register']){
  ///  echo var_dump($Param);////verify params 

	if(!$Param['register']) Error(1,'procedura este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `proceduri` VALUES ('', '$Exp[0]')");


////   /doctori/procedure/all/assd
}elseif($Module=='procedure' and $Param['all']){
    if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);

   $qr=mysqli_query($CONNECT, "SELECT * FROM `proceduri`");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;

    //// /doctori/programari/register/id_doctor.id_user.dayname.hour.coments.id_procedure
}elseif($Module=='programari' and $Param['register']){

	if(!$Param['register']) Error(1,'procedura este null');
    $Param['register']==FormChars($Param['register']);
    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `programari` VALUES ('', '$Exp[0]','$Exp[1]','$Exp[2]','$Exp[3]','$Exp[4]','$Exp[5]')");
    

//     $dayname=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT FROM `days_availability` WHERE (doctor_id=='$Exp[0]' AND dayname=='$Exp[2]')"));
//     if($dayname)
//     {
//         $Hours=explode(',',$dayname['hours_list']);
    
//     /// create new programare
//    /// mysqli_query($CONNECT, "INSERT INTO `programari` VALUES ('', '$Exp[0]','$Exp[1]','$Exp[2]','$Exp[3]','$Exp[4]')");
        
//     }else{
//         mysqli_query($CONNECT,"INSERT INTO `days_availability` VALUES ('','$Exp[2]','$Exp[3]',1,'$Exp[0]')");
//     }

////      /doctori/programari/getbyiddoctor/id_doctor.
}elseif($Module=='programari' and $Param['getbyiddoctor']){
    if(!$Param['getbyiddoctor']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['getbyiddoctor']==FormChars($Param['getbyiddoctor']);
    $Exp=explode('.', $Param['getbyiddoctor']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    ///echo var_dump($Exp);

 $qr=mysqli_query($CONNECT, "SELECT * FROM `programari` WHERE id_doctor='$Exp[0]'");
   if(!$qr)Error(4,'Nu sa putut extrage asa date.');
    //echo var_dump($qr);
 echo '{"data":['.json_encode(mysqli_fetch_assoc($qr),JSON_UNESCAPED_UNICODE).']}';





////     /doctori/programari/all/fgads
}elseif($Module=='programari' and $Param['all']){
    if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);

   $qr=mysqli_query($CONNECT, "SELECT * FROM `programari`");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;

////    /doctori/dayavailable/register/dayname.hours_list.work_hours.doctor_id
} elseif($Module=='dayavailable' and $Param['register']){
    if(!$Param['register']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['register']==FormChars($Param['register']);

    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);
    mysqli_query($CONNECT, "INSERT INTO `days_availability` VALUES ('', '$Exp[0]', '$Exp[1]','$Exp[2]','$Exp[3]')");

/////     /doctori/dayavailable/all/asdf
} elseif($Module=='dayavailable' and $Param['all']){
    if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);

    $Exp=explode('.', $Param['all']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    
   $qr=mysqli_query($CONNECT, "SELECT * FROM `days_availability`");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;


////    /doctori/dayavailable/update/id.hours_list.work_hours
} elseif($Module=='dayavailable' and $Param['update']){
    if(!$Param['update']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['register']==FormChars($Param['update']);

    $Exp=explode('.', $Param['update']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
   /// echo var_dump($Exp);
    mysqli_query($CONNECT, "UPDATE `days_availability` SET hours_list='$Exp[1]',work_hours='$Exp[2]' WHERE id='$Exp[0]'");

/////    /doctori/procedure_doctor/register/proc_id.doc_id
}elseif($Module=='procedure_doctor' and $Param['register']){

 if(!$Param['register']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['register']==FormChars($Param['register']);

    $Exp=explode('.', $Param['register']);////lincul se va transforma in array delimitatorul fiind simbolul '.'
    /// echo var_dump($Exp);

    mysqli_query($CONNECT, "INSERT INTO `procedure_doctor` VALUES ('', '$Exp[0]', '$Exp[1]')");



/////    /doctori/procedure_doctor/all/p
}elseif($Module=='procedure_doctor' and $Param['all']){

 if(!$Param['all']) Error(1,'param all este null');
    // if(!$Param['param']) Error(2,'parametrii de identificcare este null');
    $Param['all']==FormChars($Param['all']);
  
   $qr=mysqli_query($CONNECT, "SELECT * FROM `procedure_doctor`");

   $alldata='{"data":[';
      $i=0;
     while($bo = mysqli_fetch_assoc($qr)) {
       // echo var_dump($bo);
        if($i>0)$alldata.=',';

        $i++;
     	$alldata.=json_encode($bo);
     }
	 $alldata.=']}';

	echo $alldata;



}