<?php

session_start();
include('../script.php');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $bdd = PDOConnect();

    // Delete personnage
    $q = 'DELETE FROM PERSONNAGE WHERE id_uti = :id';
    $req = $bdd->prepare($q);
    $req->execute(['id' => $id]);

    // Delete Newsletter list
    $q = 'DELETE FROM LISTE_NEWSLETTER WHERE email = :email';
    $req = $bdd->prepare($q);
    $req->execute(['email' => $_SESSION['email']]);

    // Email verification
    $q = 'DELETE FROM EMAIL_VERIF WHERE email = :email';
    $req = $bdd->prepare($q);
    $req->execute(['email' => $_SESSION['email']]);

    // Change l'id de l'host de la partie
    $q = 'UPDATE PARTIE SET id_uti = NULL WHERE id_uti = :id';
    $req = $bdd->prepare($q);
    $req->execute(['id' => $id]);

    // Delete utilisateur
    $q = 'DELETE FROM UTILISATEUR WHERE id_uti = :id';

    $req = $bdd->prepare($q);
    $req->execute(['id' => $id]);
    header('location:../index.php');

    session_destroy();
    header('location:../index.php');
}