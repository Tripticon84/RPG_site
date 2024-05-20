<?php
session_start(); 
include('../script.php'); 

$db = PDOConnect(); // 

$requete = $db->prepare('SELECT PERSONNAGE.id_uti , PERSONNAGE.role, UTILISATEUR.pseudo
                         FROM PERSONNAGE 
                         JOIN UTILISATEUR ON PERSONNAGE.id_uti = UTILISATEUR.id_uti
                         WHERE id_partie = :id_partie' ); // récupère le pseudo et le role des personnes avec leur id session trouver dans PERSONNAGE

$requete -> execute([
    'id_partie' => $_SESSION['id_partie']
]);

$result = $requete->fetchAll(PDO::FETCH_ASSOC);

/*
 $result[0][role] -> les roles
 $result[0][pseudo] -> les pseudo

  $result[1][role] -> les roles
 $result[1][pseudo] -> les pseudo etc...

*/



header('Content-Type: application/json');
echo json_encode($result);





?>