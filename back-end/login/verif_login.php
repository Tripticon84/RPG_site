<?php
// Connexion à la BDD
require_once '../script.php';
$bdd = PDOConnect();


// Si email ou password n'existent pas vide > redirection vers connexion.php avec un message d'erreur
if (
    !isset($_POST['email'])
    || empty($_POST['email'])
    || !isset($_POST['password'])
    || empty($_POST['password'])
) {
    header('location:index.php');
    exit;
}

// Si l'email n'est pas valide > redirection avec une erreur
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    header('location:index.php');
    exit;
}


// Si le compte utilisateur n'existe pas en db > redirection

// Écrire la requête SELECT à trous
$q = 'SELECT id_uti FROM UTILISATEUR WHERE email = :email AND password = :password';

// Préparer la requête
$req = $bdd->prepare($q);

// Salage du mot de passe
$salt = 'JimmyRohanYann';
$pass_salt = $_POST['password'] . $salt;
$pass_hash = hash('sha256', $pass_salt);

// Exécuter la requête 
$req->execute([
            'email' => $_POST['email'],
            'password' => $pass_hash
]);

// Récupérer les résultats dans un tableau $results
$results = $req->fetchAll();

// Si $results est vide > redirection
if (empty($results)) {
    header('location:index.php');
    exit;
}

// Si l'utilisateur n'est pas admin > redirection sur le front office

// Écrire la requête SELECT à trous
$q = 'SELECT status FROM UTILISATEUR WHERE email = :email';

// Préparer la requête
$req = $bdd->prepare($q);

// Exécuter la requête
$req->execute([
    'email' => $_POST['email']
]);

// Récupérer les résultats dans un tableau $results
$results = $req->fetchAll();

if ($results[0]['status'] == 2) {
    header('location: ../../front-end/index.php');
}


// Si on arrive ici, c'est que tout est OK
// Connectons l'utilisateur

// Création d'une session
session_start();

// Ajout de l'email à la session
$_SESSION['user'] = $_POST['email'];


// Redirection vers la page d'accueil
header('location:../index.php');
exit;


?>