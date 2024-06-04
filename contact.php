<?php 
require_once __DIR__."/vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;


$mail = new PHPMailer(true);
$mail->From = $_POST['email'];
$mail->FromName = $_POST['name'];
$mail->addAddress("g.muntoni.cs@gmail.com");
$mail->isHTML(false);
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];

try {
    if (!$mail->send())
        echo "Invio fallito " . $mail->ErrorInfo;
    else
        echo "Messaggio inviato con successo";
} catch (\PHPMailer\PHPMailer\Exception $e) {
    echo $e->getMessage();
}
