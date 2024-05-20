<?php 
session_start();
include('../script.php');


$db=PDOConnect();


$requete  = $db->prepare('SELECT id_camp FROM PARTIE WHERE id_partie = :id_partie');
$requete->execute([
"id_partie" => $_SESSION["id_partie"]
]);

$id_camp = $requete->fetch();




$req = $db->prepare('SELECT 

sort_nom,
sort_description,
classe,
distance,
sort_degats,
temps_recharge

FROM SORT WHERE  id_camp= :id_camp '); 

$req->execute([
    "id_camp" => $id_camp["id_camp"]
]);
$sorts = $req->fetchAll(PDO::FETCH_ASSOC);



header('Content-Type: application/json');
echo json_encode($sorts);


?>