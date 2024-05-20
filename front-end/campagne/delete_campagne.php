<<?php 
session_start();
include('../script.php');


$db=PDOConnect();

$req= $db->prepare('DELETE FROM PLATEAU WHERE id_plateau = :id_plateau ;');
$req ->execute([
    "id_plateau" => 2 //temporaire
]);



?>