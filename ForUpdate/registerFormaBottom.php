 
after surname ;;;

 <label class="registercomponent" for="telephone">Telephone</label>
            <input class="registercomponent"  id="telephone" name="telephone" placeholder="(xxx) xxx-xxxx"><br>
           ////

Email
           ////
             <label class="registercomponent" for="faculty">Facultatea <em>*</em></label>
            <input class="registercomponent" id="faculty" name="faculty" autofocus required><br>
            <label class="registercomponent" for="speciality">Specialitatea <em>*</em></label>
            <input class="registercomponent" id="speciality" name ="speciality" AUTOFOCUS required><br>


            forma two completation
after legend tag


<label class="registercomponent" for="birthDate">Birth Date<em>*</em></label>
            <input class="registercomponent" id="birthDate" name="birthDate" type="date" required><br>
            <label class="registercomponent" for="matriculationDate">Anul Inmatricularii<em>*</em></label>
            <input class="registercomponent" id="matriculationDate" name="matriculationDate" type="date" required><br>
            <label class="registercomponent" for="gender">Gen</label>
            <select class="registercomponent" id="gender" name="gender">
            	<option value="none">None</option>
                <option value="female">Feminin</option>
                <option value="male">Masculin</option>
            </select><br>

//////////////////////////////////
after password put this 


            <label class="registercomponent" for="comments">Unde ai auzit despre UST?<em>*</em></label>
            <textarea class="registercomponent" id="comments" name="comments"  autofocus required></textarea><br>



///////////////////////////////Restore code ///////////////////////////////////////////////////////////////////
<?php
if($Module='restore' and $Param['code'] and substr($_SESSION['RESTORE'], 0,4)=='wait') MesageSend(1,'Dvs deja ati transmis cererea de restabilire a parolei. Confirmati email-ul dvs <b>'.substr($_SESSION['RESTORE'],5).'</b>');

if($Module='restore' and $_SESSION['RESTORE'] and substr($_SESSION['RESTORE'], 0,4)=='wait') MesageSend(1,'Parola dvs a fost schimbata. Pentru logare folositi noua parola. <b>'.$_SESSION['RESTORE'].'</b>','/login');



elseif($Module=='restore' and $_POST['enter']){

$_POST['login']==FormChars($_POST['login']);
$_POST['captcha']==FormChars($_POST['captcha']);
if(!$_POST['login'] and !$_POST['captcha']) MesageSend(1,' OOps forma este indeplinita gresit.');
if($_SESSION['captcha']!=md5($_POST['captcha'])) MesageSend(1,'Codul captcha este indeplinit gresit');


$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `id`,`Email` FROM `Users` WHERE login='$_POST[login]'"));

if(!$Row['Email'])MesageSend(3,'Nu este utilizator cu asa date');
////transmitem mesajul de restabilire a parolei 
////transmitem mesajul de restabilire a parolei 

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

         MesageSend(3,': Mesajul de restabilire a contului a fost transmis la adresa <b>'.HideEmail($Row['Email']).'</b>.'); ;

         } else {

         MesageSend(3,': Din pacate restabilirea este imposibila. Masajul de restabilire a contului nu sa transmis la adresa <b>'.HideEmail($Row['Email']).'</b>.');

         }


}elseif($Module='restore' and $Param['code']){

//////TO DO
$IdValue=base64_decode($Param['code']);
$Row=mysqli_fetch_assoc(mysqli_query($CONNECT,"SELECT `login` FROM `Users` WHERE `id`='$IdValue'"));

if(!$Row['login']) MesageSend(1,': Nu se poate de restabilit parola. Conectati administratorul in cazuri exceptionale.');

$Random=RandomeString(15);
$_SESSION['RESTORE']=$Random;

mysqli_fetch_assoc(mysqli_query($CONNECT, "UPDATE `Users` SET `pasword`='$Random' WHERE login='$Row[login]'"));
MesageSend(3,'Parola este modificata cu succes.Pentru aceasta utilizati noua parola <b>$Random</b>. Daca aceasta nu va convine o puteti schimba din setarile profilului.','/login');







}else
