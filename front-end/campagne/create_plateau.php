<?php 
session_start();
include('../script.php');


$db=PDOConnect();

$req= $db->prepare('INSERT INTO PLATEAU (plateau_nom,image,id_partie) VALUES ("plateau1",?,?)');
$req ->execute([
    "defaultmap.jpg",
    $_SESSION["id_partie"]
]);



?>