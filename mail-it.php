<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';


$mail= new PHPMailer;
try{                                 // Enable verbose debug output
    $mail->isSMTP();      
	$mail->SMTPAuth = true;

	$mail->Host = 'tls://smtp.gmail.com:587';
$mail->SMTPOptions = array(
   'ssl' => array(
     'verify_peer' => false,
     'verify_peer_name' => false,
     'allow_self_signed' => true
    )
);
	$mail->Username ="ing.rowill.13@gmail.com"; // aqui SOFI Le cambias el correo por el tuyo y no se te olvide darle permiso de acceso e.e
	$mail->Password = "20424814rowill93"; //la contraseña del correo
	

	$mail->From = $_POST["email"];
	$mail->FromName =$_POST["name"];

	$mail->AddAddress("rj13.bb@gmail.com");//aqui hacia donde van dirigidos copia y pega  si son varios
	$mail->IsHTML(true);
	$mail->Subject = "ASUNTO";

	$body = "<h1> Este es el mensaje</h1> <br> <h2>Mensaje enviado el " .date('m-d-Y')."</h2> <br>";
	$body.= $_POST["message"];

	$mail->Body =$body;//mensaje a enviar
	$exito =$mail->send(); //Envia el correo
	if($exito){
	}else{
		echo "Hubo un inconveniente. Contacta a un administrador.". $mail->ErrorInfo;

	}

} catch(Exeption $e){
//También podríamos agregar simples verificaciones para saber si se envió:


	echo "Hubo un inconveniente. Contacta a un administrador.". $mail->ErrorInfo;
}

/*
$send_to = "ing.rowill.13@gmail.com";
$send_subject = "Ajax form";



/*Be careful when editing below this line */

$f_name = cleanupentries($_POST["name"]);
$f_email = cleanupentries($_POST["email"]);
$f_message = cleanupentries($_POST["message"]);
$from_ip = $_SERVER['REMOTE_ADDR'];
$from_browser = $_SERVER['HTTP_USER_AGENT'];

function cleanupentries($entry) {
	$entry = trim($entry);
	$entry = stripslashes($entry);
	$entry = htmlspecialchars($entry);

	return $entry;
}
/*
$message = "This email was submitted on " . date('m-d-Y') . 
"\n\nName: " . $f_name . 
"\n\nE-Mail: " . $f_email . 
"\n\nMessage: \n" . $f_message . 
"\n\n\nTechnical Details:\n" . $from_ip . "\n" . $from_browser;

$send_subject .= " - {$f_name}";

$headers = "From: " . $f_email . "\r\n" .
    "Reply-To: " . $f_email . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

if (!$f_email) {
	echo "no email";
	exit;
}else if (!$f_name){
	echo "no name";
	exit;
}else{
	if (filter_var($f_email, FILTER_VALIDATE_EMAIL)) {
		mail($send_to, $send_subject, $message, $headers);
		header("location:index.html");
	}else{
		echo "invalid email";
		exit;
	}
}
*/
?>