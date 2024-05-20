<?php 
session_start();
include('../script.php');


$db=PDOConnect();

$req = $db->prepare('SELECT 
id_personnage,
id_inv_sort	,
id_partie,	
id_inv_obj	,	
role	,
biographie	,
race	,
pv_max	,
pv	,
armure,	
argent,	
vitesse,	
initiative,	
note	,
`force` ,	
dexterite,	
constitution,	
intelligence,	
sagesse	,
charisme,	
prenom	,
nom	
FROM PERSONNAGE WHERE role = 3 AND id_partie= :id_partie'); //role 3 = créature  / pnj


$req->execute([
    "id_partie" => $_SESSION["id_partie"]
]);

$creature = $req->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($creature);


?>