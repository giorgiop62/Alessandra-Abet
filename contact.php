<?php 
require_once __DIR__."/vendor/autoload.php"; //PHPMailer Object 




$mail = new PHPMailer; //From email address and name 
$mail->From = filter_input(INPUT_POST, $_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);; 
$mail->FromName = filter_input(INPUT_POST, $_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
$mail->addAddress("giorgiop62@gmail.com");
$mail->isHTML(false); 
$mail->Subject = filter_input(INPUT_POST, $_POST['subject'], FILTER_SANITIZE_SPECIAL_CHARS); 
//$mail->Body = "<i>Mail body in HTML</i>";
$mail->AltBody = filter_input(INPUT_POST, $_POST['message'], FILTER_SANITIZE_SPECIAL_CHARS);

if (!$mail->send()) {
  echo "Mailer Error: " . $mail->ErrorInfo; 
} else { 
  echo "Messaggio inviato con successo"; 
}



