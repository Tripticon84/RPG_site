<?php

session_start();

include('script.php');  
/* POUR ATTRAPER L ID DE LA SESSION MAIS PAS ENCORE AU POINT SAH 
// Vérifie si l'ID de l'utilisateur est présent dans la session
if (!isset($_SESSION['id'])) {
    // Redirige vers une page d'erreur ou de connexion si l'ID n'est pas présent
    header("Location: index.php");
    exit; 
} */

// Récupère l'ID de l'utilisateur depuis la session
//$id = $_SESSION['id_uti']   -  la bonne ligne mais pour l'instant on va prendre autre chose 





// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupère les données du formulaire

    // Association d'un nouveau pseudo a une variable
    $nouveau_pseudo = $_POST["pseudo"];
    $nouveau_prenom = $_POST["prenom"];
    $nouveau_nom = $_POST["nom"];



    

    // Connexion à la base de données avec PDO
    try {
        
        $db=PDOConnect(); //connexion a la bdd 

        // Prépare et exécute la requête SQL pour mettre à jour le pseudo de l'utilisateur
        /*$requete = $db->prepare('UPDATE utilisateur SET pseudo = :pseudo WHERE id_uti = :id'); la bonne requête mais pas encore explotiable */
        $requete = $db->prepare("UPDATE utilisateur SET pseudo = :pseudo WHERE id_uti =1"); //requête temporaire pour tester avec id=1
        $requete2 = $db->prepare("UPDATE utilisateur SET prenom = :prenom WHERE id_uti =1"); //requête temporaire pour tester avec id=1
        $requete3 = $db->prepare("UPDATE utilisateur SET nom = :nom  WHERE id_uti =1"); //requête temporaire pour tester avec id=1

        /* $requete->bindParam(':id', $id);  la bonne requête mais pas exécutable pour le moment */

        
        $requete->bindParam(':pseudo', $nouveau_pseudo);
        $requete2->bindParam(':prenom', $nouveau_prenom);
        $requete3->bindParam(':nom', $nouveau_nom);
    

        $requete->execute();
        $requete2->execute();
        $requete3->execute();

  


        // Redirige vers une page de confirmation ou de profil après la mise à jour
        header("Location: private.php");
        exit; // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}

?>
