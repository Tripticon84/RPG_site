<?php

require_once('../script.php');

$bdd = PDOConnect();

if (isset($_GET['search']) && isset($_GET['sort']) && isset($_GET['order'])) {

    $s = $_GET['search'];
    $sort = isset($_GET['sort']) && !empty($_GET['sort']) ? $_GET['sort'] : 'nom';
    $order = isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 'asc';

    if (empty($s)) {
        $q = "SELECT CAMPAGNE.id_camp, CAMPAGNE.nom, CAMPAGNE.description, CAMPAGNE.logo, UTILISATEUR.pseudo
              FROM CAMPAGNE
              JOIN UTILISATEUR ON CAMPAGNE.createur = UTILISATEUR.id_uti
              WHERE CAMPAGNE.brouillon=0 ORDER BY :sort :order;";
        $req = $bdd->prepare($q);
        $success = $req->execute([
            'sort' => $sort,
            'order' => $order
        ]);
    } else {
        $q = "SELECT CAMPAGNE.id_camp, CAMPAGNE.nom, CAMPAGNE.description, CAMPAGNE.logo, UTILISATEUR.pseudo
              FROM CAMPAGNE
              JOIN UTILISATEUR ON CAMPAGNE.createur = UTILISATEUR.id_uti
              WHERE CAMPAGNE.brouillon=0 AND CAMPAGNE.nom LIKE :search ORDER BY :sort :order;";
        $req = $bdd->prepare($q);
        $success = $req->execute([
            'search' => '%' . $s . '%',
            'sort' => $sort,
            'order' => $order
        ]);
    }


    if ($success) {
        $campagnes = $req->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($campagnes);
    }
} else {
    http_response_code(400); // BAD REQUEST
}
