<?php
include('script.php');
include('includes/head.php'); 
include('includes/header.php');  




// faire en sorte que la page renvoie aux informations de l'utilisateur ou le pseudo est dans l'url
// mais que seul l'utilisateur avec l'id associé au pseudo puisse modifier la page



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = PDOConnect();

    $pseudo = $_SESSION['pseudo'];
    $id = $_SESSION['id_uti'];
    $pseudoUrl = $_GET['pseudo']; //récupère le pseudo dans l'url

    if ($pseudoURL != $_SESSION['pseudo']){ // si le pseudo de la session est différent de celui de la page n'autorises pas la modification 
        header("location:profil.php?" . 'pseudo=' . $pseudoUrl); 
    }

    
   

    if (!empty($_POST['texte_recherche'])){
    $requete = $db->prepare('UPDATE utilisateur SET texte_recherche = :texte_recherche WHERE id_uti = :id'); 


    $requete->execute([

    'texte_recherche' => $_POST['texte_recherche'], 
    'id' =>$id 

    ]);

    }

    if (!empty($_POST['texte_je_suis'])){
    $requete2 = $db->prepare('UPDATE utilisateur SET texte_je_suis = :texte_je_suis WHERE id_uti = :id'); 


    $requete2->execute([

    'texte_je_suis' => $_POST['texte_je_suis'], 
    'id' =>$id 

    ]); 
}

}

header("Location:profil.php");



?>