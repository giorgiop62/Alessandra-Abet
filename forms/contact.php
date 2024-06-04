<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ottieni i dati inviati dal modulo
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Importa le classi PHPMailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Carica l'autoload di Composer
    require 'vendor/autoload.php';

    // Crea un'istanza di PHPMailer; passando `true` abiliti le eccezioni
    $mail = new PHPMailer(true);

    try {
        // Configurazioni del server
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Abilita l'output di debug dettagliato
        $mail->isSMTP();                                            // Invia utilizzando SMTP
        $mail->Host       = 'smtp.example.com';                     // Imposta il server SMTP da utilizzare (es. 'smtp.gmail.com')
        $mail->SMTPAuth   = true;                                   // Abilita l'autenticazione SMTP
        $mail->Username   = 'user@example.com';                     // Nome utente SMTP
        $mail->Password   = 'secret';                               // Password SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Abilita la crittografia TLS implicita
        $mail->Port       = 465;                                    // Porta TCP a cui connettersi; utilizza 587 se hai impostato `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        // Destinatari
        $mail->setFrom('from@example.com', 'Mailer');
        $mail->addAddress('giorgiop62@gmail.com', 'Giorgio');     // Aggiungi un destinatario
        // $mail->addAddress('ellen@example.com');               // Il nome è opzionale
        $mail->addReplyTo('info@example.com', 'Informazioni');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        // Allegati (se necessari)
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Aggiungi allegati
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Nome opzionale

        // Contenuto
        $mail->isHTML(true);                                  // Imposta il formato dell'email su HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message); // Corpo in testo semplice per i client di posta che non supportano HTML

        $mail->send();
        echo 'Il messaggio è stato inviato';
    } catch (Exception $e) {
        echo "Il messaggio non può essere inviato. Errore del Mailer: {$mail->ErrorInfo}";
    }
} else {
    // Metodo non consentito
    http_response_code(405);
    echo 'Metodo non consentito';
}
?>
