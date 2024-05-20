<?php 
session_start();
include('../script.php');


$db=PDOConnect();


$req = $db->prepare('SELECT id_plateau FROM PLATEAU WHERE id_partie = :id_partie'); //récupère les id des plateaux
$req->execute([
    "id_partie" => $_SESSION["id_partie"]
]);

$id_plateau = $req->fetchAll(PDO::FETCH_ASSOC);



$requete= $db->prepare('DELETE FROM PLATEAU WHERE id_plateau = :id_plateau ;');

for ($i = 0; $i < count($id_plateau); $i++) {

$requete ->execute([
    "id_plateau" => $id_plateau[i]["id_plateau"] //temporaire
]);

}


?>