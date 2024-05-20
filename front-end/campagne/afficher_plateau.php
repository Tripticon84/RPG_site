<?php 
session_start();
include('../script.php');


$db=PDOConnect();

$req= $db->prepare('SELECT id_plateau , plateau_nom, image FROM PLATEAU  WHERE id_partie = :id_partie'); //récupère le plateau de la partie
$req ->execute([
    "id_partie" => $_SESSION["id_partie"]
]);

$res= $req->fetchAll(PDO::FETCH_ASSOC);




header('Content-Type: application/json');
echo json_encode($res)

?>