<?php
session_start(); 
include('../script.php'); 


$db = PDOConnect(); // 



$requete2 = $db->prepare('SELECT role FROM PERSONNAGE WHERE id_partie = :id_partie'); // récupère le rôle des gens dans ma partie
$requete2 -> execute([
    'id_partie' => $_SESSION['id_partie']
]);

$lobby = $requete2->fetchAll(PDO::FETCH_ASSOC);


$check = 0;

for ($i = 0 ; $i < count($lobby) ; $i++){

    
if($lobby[$i]["role"] == 0 ){ //si quelqu'un a déjà le role mj check 0 -> check 1
    echo($lobby[$i]['role']);
    $check = 1;
}
}


if($check !=1){

$req = $db->prepare('UPDATE PERSONNAGE SET role = 0 WHERE id_uti = :id_uti AND id_partie = :id_partie'); // Update role to Mj
$req->execute([
    "id_uti" => $_SESSION["id_uti"],
    "id_partie" => $_SESSION["id_partie"]
]);

}

