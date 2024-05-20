<?php

require_once '../front-end/includes/head.php';
require_once '../front-end/script.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;



// Récupération des 3 dernières campagnes

$db = PDOConnect();

$q = 'SELECT CAMPAGNE.id_camp, CAMPAGNE.nom, CAMPAGNE.description, CAMPAGNE.logo, UTILISATEUR.pseudo
        FROM CAMPAGNE
        JOIN UTILISATEUR ON CAMPAGNE.createur = UTILISATEUR.id_uti
        WHERE CAMPAGNE.brouillon=0 ORDER BY CAMPAGNE.id_camp DESC LIMIT 3;';

$req = $db->prepare($q);
$req->execute();

$campagnes = $req->fetchAll(PDO::FETCH_ASSOC);

// Récupérer les emails des inscrits à la newsletter

$q = 'SELECT email FROM NEWSLETTER_LIST;';

$req = $db->prepare($q);
$req->execute();

$emails = $req->fetchAll(PDO::FETCH_COLUMN);

// Inscription des emails et campagnes dans la base de données

$q = 'INSERT INTO NEWSLETTER (date, campagne1, campagne2, campagne3, nb_emails) VALUES (:date, :campagne1, :campagne2, :campagne3, :nb_emails);';

$req = $db->prepare($q);

$req->execute([
    'date' => date('Y-m-d'),
    'campagne1' => $campagnes[0]['nom'],
    'campagne2' => $campagnes[1]['nom'],
    'campagne3' => $campagnes[2]['nom'],
    'nb_emails' => count($emails)
]);




// Envoi des newsletters


$html = '<body><h1>Les 3 dernières campagnes : </h1>' .
    '<div><h2>' . $campagnes[0]['nom'] . '</h2>' .
    '<p>' . $campagnes[0]['description'] . '</p></div><br>' .
    '<div><h2>' . $campagnes[1]['nom'] . '</h2>' .
    '<p>' . $campagnes[1]['description'] . '</p></div><br>' .
    '<div><h2>' . $campagnes[2]['nom'] . '</h2>' .
    '<p>' . $campagnes[2]['description'] . '</p></div></body>';


echo $html;

require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/PHPMailer/SMTP.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

$mail = new PHPMailer(true);

$mail->isSMTP();

$mail->CharSet = 'UTF-8';

$mail->isHTML(true);

$mail->SMTPDebug = SMTP::DEBUG_OFF;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 465;

$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;


$mail->SMTPAuth = true;

$mail->Username = USERNAME;
$mail->Password = PASSWORD;

$mail->setFrom(USERNAME);

$mail->Subject = 'Découvrez les derniers campagnes de Roll of Odyssey';
$mail->Body = $html;

$result = "";

foreach ($emails as $email) {
    $mail->addReplyTo($email);
    $mail->addAddress($email);

    if (!$mail->send())
        $result .= "Email non envoyé à $email. " . $mail->ErrorInfo . "\n";
    else
        $result .= "Email envoyé à $email.\n";

    // Clear all addresses and attachments for next loop
    $mail->clearAddresses();
    $mail->clearAttachments();
}

return $result;