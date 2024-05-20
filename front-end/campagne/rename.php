<?php 
session_start();
include('../script.php');

$db = PDOConnect();



$req = $db->prepare('SELECT id_plateau,plateau_nom FROM PLATEAU WHERE id_partie = :id_partie');
$req->execute([
    "id_partie" => $_SESSION["id_partie"]
]);

$id_plateau = $req->fetchAll(PDO::FETCH_ASSOC);


$req = $db->prepare('UPDATE PLATEAU SET plateau_nom = :plateau_nom WHERE id_partie = :id_partie AND id_plateau = :id_plateau');

for ($i = 0; $i < count($id_plateau); $i++) {
    $plateau_nom = $_POST["plateau_nom".$i];
    echo($id_plateau[$i]["id_plateau"]);
    echo($id_plateau[$i]["plateau_nom"]);
    echo($plateau_nom);

    if ($plateau_nom != null) {
        $req->execute([
            "plateau_nom" => $plateau_nom,
            "id_partie" => $_SESSION["id_partie"],
            "id_plateau" => $id_plateau[$i]["id_plateau"]
        ]);
        


    } //fin du if
} //fin du for
?>
