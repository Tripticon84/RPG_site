<?php

require_once('../script.php');

function partiesList()
{
    $bdd = PDOConnect();
    $q = 'SELECT PARTIE.id_partie, UTILISATEUR.pseudo, CAMPAGNE.nom, CAMPAGNE.logo, PARTIE.prive, PARTIE.code, PARTIE.limite_joueur 
        FROM PARTIE 
            INNER JOIN UTILISATEUR ON PARTIE.id_uti = UTILISATEUR.id_uti
            INNER JOIN CAMPAGNE ON PARTIE.id_camp = CAMPAGNE.id_camp';

    $req = $bdd->prepare($q);
    $req->execute();
    $parties = $req->fetchAll(PDO::FETCH_ASSOC);

    return $parties;
}

function partieDelete($id)
{
    $bdd = PDOConnect();

    $q = 'DELETE FROM PERSONNAGE WHERE id_partie = :id';
    $req = $bdd->prepare($q);
    $req->execute([
        'id' => $id,
    ]);
    
    $q = 'DELETE FROM PARTIE WHERE id_partie = :id';
    $req = $bdd->prepare($q);
    $req->execute([
        'id' => $id,
    ]);
}



// Si l'action est 'delete' et que l'id est défini > supprimer la campagne
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    partieDelete($_GET['id']);
    header('location:index.php' . '?' . 'success=Campagne supprimé');
    exit();
}

