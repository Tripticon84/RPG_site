<?php 
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php'); 

$db = PDOConnect(); 




$q = "SELECT CAMPAGNE.id_camp, CAMPAGNE.nom, CAMPAGNE.description, CAMPAGNE.logo, UTILISATEUR.pseudo
              FROM CAMPAGNE
              JOIN UTILISATEUR ON PERSONNAGE.id_personnage = UTILISATEUR.id_uti
              WHERE CAMPAGNE.brouillon=0 ORDER BY :sort :order;";
        $req = $bdd->prepare($q);
        $success = $req->execute([
            'sort' => $sort,
            'order' => $order
        ]);

/* Selectionne l'id de la campagne , son nom , sa description , son logo WHERE 
 l'id de la partie , l'id de l'utilisateur ayant créer la partie , l'id des personnages qui sont égales a la partie


 SELECT id_camp , nom , description , logo, PERSONNAGE.id_partie FROM CAMPAGNE et PERSONNAGE 
 
 
 WHERE PERSONNAGE.id_uti  */




 /* Selectionne les campagnes ou l'utilisateur à un personnage. 

 /* Pour ca il faut connaître : les personnage de l'utilisateur , ou est ce que ces personnages aparaissent dans les parties


Les personnages de l'utilisateur = 

 requête1 = SELECT id_personnage FROM PERSONNAGE WHERE id_uti = :id;

 requête-> execute([
    :id => $_SESSION["id_uti"]
 ]);


requête2 = SELECT id_partie FROM personnage WHERE id.Personnage = requête1 



SELECT [informations de la campagne] WHERE PERSONNAGE.id_partie = requête2 

 