<?php 
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php'); 
 

$code = $_POST["code"];



NotConnect(); //renvoie l'utilisateur s'il n'est pas connecté 

if($code==null){
   header("location:campagne.php");
}

$db = PDOConnect(); 

$requete = $db->prepare('SELECT code,limite_joueur,id_uti,id_partie FROM partie'); //prépare une requpete pour comparé le code a tous les codes de partie
$requete->execute();
$result=$requete->fetchAll();




// il faut ajouter une protection pour qu'un utilisateur ne puisse pas rejoindre plusieurs fois la même partie 

for ($i = 0 ; $i <sizeof($result); $i++) {
$id_partie=$result[$i]['id_partie'];

    if($code==$result[$i]["code"]){

        if ($result[$i]["limite_joueur"] == 0 ){
            
            header("location:campagne.php?=La limite de joueur a été atteinte");
            exit;
        }


/* si le code est valide et que la taille maximale n'est pas excéder créer un personnage pour l'utilisateur qui lui 
permettra de se faire reconnaitre dans la partie avec le rôle spectateur temporairement

personnage : Son propre id,  l'id de l'utilisateur a qui il appartient ,  l'id de la partie a laquelle il appartient , son rôle 
*/  
        $requete2 = $db->prepare('INSERT INTO personnage (role,id_uti,id_partie) VALUES (2,?,?)'); //role 0 = spectateur  role=1 Mj role 2 = spectateur 
        $requete2->execute([
            $_SESSION['id_uti'],
            $id_partie
        ]);

        $requete3 = $db->prepare('UPDATE partie SET limite_joueur=limite_joueur-1 WHERE id_partie = ?');
        $requete3 ->execute([
            $id_partie
        ]);

    }
    


    $_SESSION['id_partie'] = $id_partie ;

    header("location: ../lobby/lobby.php");
    
}












