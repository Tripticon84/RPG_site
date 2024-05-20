<?php
session_start();
require_once '../script.php';

$bdd = PDOConnect();

if (isset($_GET['create']) && !empty($_GET['create']) && is_numeric($_GET['create'])) {

    $id_camp = $_GET['create'];

    $q = "SELECT id_camp, nom, description, logo FROM CAMPAGNE WHERE id_camp = $id_camp;";
    $req = $bdd->prepare($q);
    $success = $req->execute();
    $campagne = $req->fetch(PDO::FETCH_ASSOC);


    $q = "INSERT INTO PARTIE (id_uti, id_camp, partie_nom, partie_logo, prive, code, limite_joueur) VALUES (:id_uti, :id_camp, :partie_nom, :partie_logo, :prive, :code, :limite_joueur);";

    $req = $bdd->prepare($q);

    $success = $req->execute([
        'id_uti' => $_SESSION['id_uti'],
        'id_camp' => $id_camp,
        'partie_nom' => $campagne['nom'],
        'partie_logo' => $campagne['logo'],
        'prive' => 1,
        'code' => bin2hex(random_bytes(3)),
        'limite_joueur' => 11
    ]);

    if ($success) {
        $id_partie = $bdd->lastInsertId();
        $q = "INSERT INTO PERSONNAGE (id_partie, id_uti, role) VALUES (:id_partie, :id_uti, :role);";
        $req = $bdd->prepare($q);
        $success = $req->execute([
            'id_partie' => $id_partie,
            'id_uti' => $_SESSION['id_uti'],
            'role' => 2
        ]);

        $_SESSION['id_partie'] = $id_partie;

        header('location: ../lobby/lobby.php');

    } else {
        http_response_code(500); // INTERNAL SERVER ERROR
    }
        

} else {
    http_response_code(400); // BAD REQUEST
}