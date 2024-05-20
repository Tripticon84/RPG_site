<?php 
session_start();
include('../script.php');


$db=PDOConnect();


$requete  = $db->prepare('SELECT id_camp FROM PARTIE WHERE id_partie = :id_partie');
$requete->execute([
"id_partie" => $_SESSION["id_partie"]
]);

$id_camp = $requete->fetch();


$requete2  = $db->prepare('SELECT 

obj_nom,
obj_description,
categorie,
obj_degats

 FROM objet WHERE id_camp = :id_camp');

$requete2->execute([
"id_camp" =>$id_camp["id_camp"]
]);

$equipement= $requete2->fetchAll(PDO::FETCH_ASSOC);


header('Content-Type: application/json');
echo json_encode($equipement);


?>