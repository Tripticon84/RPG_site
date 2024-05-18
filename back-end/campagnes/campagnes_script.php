<?php

require_once('../script.php');

function campagneList()
{

    $bdd = PDOConnect();
    $q = 'SELECT id_camp, id_plateau, logo, nom, description, brouillon, (SELECT pseudo FROM UTILISATEUR WHERE id_uti = createur) AS createur FROM CAMPAGNE ORDER BY id_camp ASC';
    $req = $bdd->prepare($q);
    $req->execute();
    $campagnes = $req->fetchAll();

    return $campagnes;
}

function usersDelete($id)
{

    $bdd = PDOConnect();
    $q = 'DELETE FROM CAMPAGNE WHERE id_camp = :id';
    $req = $bdd->prepare($q);
    $req->execute([
        'id' => $id,
    ]);
}

function campagneAdd($nom, $logo, $description, $brouillon, $createur)
{

    $bdd = PDOConnect();

    $q = 'INSERT INTO CAMPAGNE (nom, logo, description, brouillon, createur) VALUES (:nom, :logo, :description, :brouillon, :createur)';

    $req = $bdd->prepare($q);

    $req->execute([
        'nom' => $nom,
        'logo' => $logo,
        'description' => $description,
        'brouillon' => $brouillon,
        'createur' => $createur,
    ]);

}




// Si l'action est 'delete' et que l'id est défini > supprimer la campagne
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    usersDelete($_GET['id']);
    header('location:index.php' . '?' . 'success=Campagne supprimé');
}


// Si l'action est 'add' et que tout les champs sont définies et non vide > ajouter l'utilisateur
if (isset($_GET['nom']) 
    && isset($_GET['logo']) 
    && isset($_GET['description']) 
    && isset($_GET['brouillon']) 
    && isset($_GET['createur'])
    && !empty($_GET['nom'])
    && !empty($_GET['logo'])
    && !empty($_GET['description'])
    && !empty($_GET['brouillon'])
    && !empty($_GET['createur']))
    {


    campagneAdd($_GET['nom'], $_GET['logo'], $_GET['description'], $_GET['brouillon'] == 'Oui' ? 1 : 0, $_GET['createur']);
    header('location:index.php' . '?' . 'success=Utilisateur ajouté');
    exit();
}
