<?php
$title = 'PDF';
use Dompdf\Dompdf;
use Dompdf\Options;


require_once($_SERVER['DOCUMENT_ROOT'] . '/front-end/script.php');

session_start();
// Vérification que l'utilisateur bien le même que celui de la demande
if (!isset($_GET['user']) || $_GET['user'] != $_SESSION['id_uti'] || !empty($_GET['user'])) {
    // header('location: front-end/profile/private.php');
    // exit;
}

// Récupération des informations de l'utilisateur

$bdd = PDOConnect();

// Infos utilisateur
$q = 'SELECT id_uti, pseudo, nom, prenom, email, texte_recherche, texte_je_suis, avatar FROM UTILISATEUR WHERE id_uti = :id';
$req = $bdd->prepare($q);
$req->execute(['id' => $_GET['user']]);
$user = $req->fetch(PDO::FETCH_ASSOC);

$user['avatar'] = empty($user['avatar']) ? 'default' : $user['avatar'];


// Inscription à la newsletter
$q = 'SELECT id_newsletter_list FROM NEWSLETTER_LIST WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute(['email' => $user['email']]);
$newsletter = $req->fetch(PDO::FETCH_ASSOC);

// Campagnes créées
$q = 'SELECT id_camp, logo, nom, description, createur FROM CAMPAGNE WHERE createur = :id';
$req = $bdd->prepare($q);
$req->execute(['id' => $_GET['user']]);
$campagnes = $req->fetchAll(PDO::FETCH_ASSOC);

 ob_start();
 require_once 'pdfcontent.php';
 $html = ob_get_contents();
 ob_end_clean();





// Création du fichier PDF

require_once $_SERVER['DOCUMENT_ROOT'] . '/dompdf/autoload.inc.php';

$options = new Options();
$options->set('isRemoteEnabled',true);
$fichier = 'a';

$dompdf = new Dompdf($options);

$dompdf->loadHtml($html);

 $dompdf->setPaper('A4', 'portrait');

$dompdf->render();

$dompdf->stream($fichier);