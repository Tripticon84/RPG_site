<?php
require_once '../script.php';


/* Liste des email */

// Récupérer les emails de la newsletter
function newsletterList() {

    // Connexion à la base de données
    $bdd = PDOConnect();

    // Écrire la requête SELECT à trous
    $q = 'SELECT id_newsletter_list,email FROM newsletter_list';

    // Préparer la requête
    $req = $bdd->prepare($q);

    // Exécuter la requête
    $req->execute();

    // Récupérer les résultats dans un tableau $newsletters
    $liste_newsletters = $req->fetchAll();

    // Retourner le tableau $newsletters
    return $liste_newsletters;
}

// Supprimer un email de la newsletter
function newsletterDelete($id) {

    // Connexion à la base de données
    $bdd = PDOConnect();

    // Écrire la requête DELETE à trous
    $q = 'DELETE FROM newsletter_list WHERE id_newsletter_list = :id';

    // Préparer la requête
    $req = $bdd->prepare($q);

    // Exécuter la requête
    $req->execute([
        'id' => $id,
    ]);
}

// Ajouter un email à la newsletter
function newsletterAdd($email) {
    
        // Connexion à la base de données
        $bdd = PDOConnect();
    
        // Écrire la requête INSERT à trous
        $q = 'INSERT INTO newsletter_list (email) VALUES (:email)';
    
        // Préparer la requête
        $req = $bdd->prepare($q);
    
        // Exécuter la requête
        $req->execute([
            'email' => $email,
        ]);
}


 // Si l'action est 'delete' et que l'id est défini > supprimer l'email de la newsletter
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    newsletterDelete($_GET['id']);
    header('location:index.php');
    exit;
}


// Si l'action est 'add' > ajouter l'email à la newsletter
if (isset($_GET['email']) && isset($_GET['action']) && $_GET['action'] == 'add') {

    // Vérifier si l'email n’existe pas déjà dans la newsletter
    foreach (newsletterList() as $newsletter) {
        if ($newsletter['email'] == $_GET['email']) {
            header('location:index.php?message=Cet email est déjà inscrit à la newsletter.');
            exit;
        }
    }

    newsletterAdd($_GET['email']);
    header('location:index.php');
    exit;
}

/* Newsletter */

function listAllNewsletter() {

    // Connexion à la base de données
    $bdd = PDOConnect();

    // Écrire la requête SELECT à trous
    $q = 'SELECT id_newsletter,date,objet,contenu,campagne1,campagne2,recurrence FROM newsletter';

    // Préparer la requête
    $req = $bdd->prepare($q);

    // Exécuter la requête
    $req->execute();

    // Récupérer les résultats dans un tableau $newsletters
    $listNewsletters = $req->fetchAll();
    return $listNewsletters;
}


if (isset($_GET['action']) && $_GET['action'] == 'addNewsletter') {

}