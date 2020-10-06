<?php
ini_set('display_errors',1);
ob_start();

$id_user = urlencode ($_GET['newpwd-id']);
$login_user = htmlspecialchars($_GET['adresse_mail']);
//$message = $_POST["message"];




require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


$mail = new PHPmailer(true);
$mail->charSet = "UTF-8";

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;
// $mail->isSMTP(); // Paramétrer le Mailer pour utiliser SMTP 
// $mail->Host = 'smtp.gmail.com'; // Spécifier le serveur SMTP
// $mail->SMTPAuth = true; // Activer authentication SMTP
// $mail->Username = 'anais.elgueta21@gmail.com'; // Votre adresse email d'envoi
// $mail->Password = 'Azerty974+'; // Le mot de passe de cette adresse email
// $mail->SMTPSecure = 'ssl'; // Accepter SSL
// $mail->Port = 465;

$mail->setFrom('anais.elgueta21@gmail.com', 'Anais Elgueta'); // Personnaliser l'envoyeur
$mail->addAddress($login_user); // Ajouter le destinataire
// $mail->addAddress('To2@example.com');
// $mail->addReplyTo('info@example.com', 'Information'); // L'adresse de réponse
//$mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz'); // Ajouter un attachement
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');
$mail->isHTML(true); // Paramétrer le format des emails en HTML ou non

$mail->Subject = 'Mot de passe oublié';

$mail->msgHTML(file_get_contents('https://www.projetfinalelgueta.fr/pages/mail/mail_pwd_forgot?newpwd-id=' . $id_user));


//$mail->Body = "Mail du contact : <br>" . $login . "<br>Message adressé : <br>" . $message;

// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


if (!$mail->send()) {
   
    echo 'Mailer Error: ' . $mail->ErrorInfo;
$message = 'Une erreur inattendue s\'est produite!';
        header('location:../index.php?msg=false');
        //echo 'Une erreur inattendue s\'est produite!';
         exit();
    
} else {
    $message = 'Un message vous a été envoyé, merci de vérfier votre boîte mail !';
         header('location:../index.php?msg=true');
         //echo 'Votre message a bien été envoyé !';
         exit();
}

ob_flush();