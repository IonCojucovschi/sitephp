<?php
if($Module=='addbook' and  $_POST['enter']){

$_POST['title']==FormChars($_POST['title']);
$_POST['author']==FormChars($_POST['author']);

$_POST['category']==FormChars($_POST['category']);
$_POST['date']==FormChars($_POST['date']);

$_POST['description']==FormChars($_POST['description']);
$_POST['image']==FormChars($_POST['image']);
$_POST['bookcontent']==FormChars($_POST['bookcontent']);



///verify if inputs is null
// if(!$_POST['title'] or !$_POST['author'] or !$_POST['category'] or !$_POST['date'] or !$_POST['image'] or !$_POST('bookcontent')) {
// //MesageSend(1,'forma de adaogare a cartilor este indeplinita gresit');

// };

/////// foor captcha code
 if(strcmp($_SESSION['captcha'],md5($_POST['captcha']))!=0){
 	MesageSend(1,'codul captcha este scris gresit!');
}

$image="Resources/images/".$_POST['category']."/".$_FILES['image']['name'];
$book="Resources/books/".$_POST['category']."/".$_FILES['bookcontent']['name'];


///// verify extension type of image and book
$allowed =  array('gif','png' ,'jpg');
$extenPDF= array('pdf');
$imagename = $_FILES['image']['name'];
$bookName=$_FILES['bookcontent']['name'];
$imgext = pathinfo($imagename, PATHINFO_EXTENSION);
$pdfext = pathinfo($bookName, PATHINFO_EXTENSION);

global $CONNECT;
$ifBookExist=mysqli_query($CONNECT,"SELECT * FROM `books` where (title ='$_POST[title]')");

if($ifBookExist!=null) MesageSend(2,' Asa carte cu titlu dat exista!','/addbook');


if(!in_array($imgext,$allowed) ) {
    MesageSend(1,'Nu ati ales o imagine valida!','/addbook');
}
if(!in_array($pdfext,$extenPDF) ) {
    MesageSend(1,' Cartea trebuie sa aiba format PDF!','/addbook');
}

/// query to add a boo on db

mysqli_query($CONNECT, "INSERT INTO `books` VALUES ( '','$_POST[title]','$_POST[author]', '$_POST[category]','$_POST[date]', '$_POST[date]', '$_POST[description]','','$_SESSION[USER_ID]','','$book','$image')");

if (move_uploaded_file($_FILES['image']['tmp_name'], $image)) {
  		$msg = "Image uploaded successfully";
  	}else{
  		$msg = "Failed to upload image";
  	}
if (move_uploaded_file($_FILES['bookcontent']['tmp_name'], $book)) {
  		$msg = "Book uploaded successfully";
  	}else{
  		$msg = "Failed to upload book content!!";
  	}  	
 MesageSend(2,' Sa Adaogat cu succes! Mai incercati =).','/addbook');
// echo var_dump($_POST);



 }



?>