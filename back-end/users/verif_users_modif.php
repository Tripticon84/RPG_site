<?php

require_once '../script.php';

if (
    !isset($_POST['id_uti']) ||
    empty($_POST['id_uti']) ||
    !isset($_POST['pseudo']) ||
    empty($_POST['pseudo']) ||
    !isset($_POST['nom']) ||
    empty($_POST['nom']) ||
    !isset($_POST['prenom']) ||
    empty($_POST['prenom']) ||
    !isset($_POST['email']) ||
    empty($_POST['email']) ||
    !isset($_POST['password']) ||
    !isset($_POST['texte_recherche']) ||
    !isset($_POST['texte_je_suis']) ||
    !isset($_POST['biographie']) ||
    !isset($_POST['status']) ||
    empty($_POST['status'])

) {
    header('location:index.php' . '?' . 'message=Veuillez remplir tout les champs.');
    exit;
}

$bdd = PDOConnect();

$q = 'UPDATE UTILISATEUR SET pseudo = :pseudo, nom = :nom, prenom = :prenom, email = :email, texte_recherche = :texte_recherche, texte_je_suis = :texte_je_suis, biographie = :biographie, status = :status WHERE id_uti = :id_uti';

$req = $bdd->prepare($q);

$req->execute([
    'id_uti' => $_POST['id_uti'],
    'pseudo' => $_POST['pseudo'],
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'texte_recherche' => $_POST['texte_recherche'],
    'texte_je_suis' => $_POST['texte_je_suis'],
    'biographie' => $_POST['biographie'],
    'status' => $_POST['status'] == 'admin' ? 2 : 1,
]);

if (!empty($_POST['password'])) {
    $q = 'UPDATE UTILISATEUR SET password = :password WHERE id_uti = :id_uti';
    $req = $bdd->prepare($q);
    $req->execute([
        'id_uti' => $_POST['id_uti'],
        'password' => hash('sha256', $_POST['password'] . 'JimmyRohanYann'),
    ]);
}



header('location:index.php' . '?' . 'success=Utilisateur modifié');