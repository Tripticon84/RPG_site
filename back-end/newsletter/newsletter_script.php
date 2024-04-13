<?php
require_once '../script.php';


/* Liste des email */

// Récupérer les emails de la newsletter
function newsletterList() {

    // Connexion à la base de données
    $bdd = PDOConnect();

    // Écrire la requête SELECT à trous
    $q = 'SELECT id,email FROM newsletter';

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
    try {
        $bdd = new PDO('mysql:host=localhost:8889;dbname=roll-of-odyssey', 'root', 'root');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // Écrire la requête DELETE à trous
    $q = 'DELETE FROM newsletter WHERE id = :id';

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
        $q = 'INSERT INTO newsletter (email) VALUES (:email)';
    
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

// Afficher toutes les newsletters
function showNewsletter() {
    
}