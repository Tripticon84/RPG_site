<?php
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');



  if (isset($_POST["prenom"])) {
        $nom = isset($_POST["nom"]) ? $_POST["nom"] : '';
        $prenom = $_POST["prenom"];
        
        $avatar = isset($_POST["avatar"]) ? $_POST["avatar"] : '';
        $biographie = isset($_POST["biographie"]) ? $_POST["biographie"] : '';
        $race = isset($_POST["race"]) ? $_POST["race"] : '';
        
        $pv_max = isset($_POST["pv_max"]) ? $_POST["pv_max"] : 0;
        $armure = isset($_POST["armure"]) ? $_POST["armure"] : 0;
        $vitesse = isset($_POST["vitesse"]) ? $_POST["vitesse"] : 0;
        $initiative = isset($_POST["initiative"]) ? $_POST["initiative"] : 0;
        
        $force = isset($_POST["force"]) ? $_POST["force"] : 0;
        $dexterite = isset($_POST["dexterite"]) ? $_POST["dexterite"] : 0;
        $constitution = isset($_POST["constitution"]) ? $_POST["constitution"] : 0;
        $intelligence = isset($_POST["intelligence"]) ? $_POST["intelligence"] : 0;
        $sagesse = isset($_POST["sagesse"]) ? $_POST["sagesse"] : 0;
        $charisme = isset($_POST["charisme"]) ? $_POST["charisme"] : 0;
        $equipement_capacite = isset($_POST["equipement_capacite"]) ? $_POST["equipement_capacite"] : '';
        $armes = isset($_POST["armes"]) ? $_POST["armes"] : '';
        $argent = isset($_POST["argent"]) ? $_POST["argent"] : 0;
        $talent = isset($_POST["talent"]) ? $_POST["talent"] : '';

 }



echo($prenom. "" );
var_dump($prenom); 

echo($nom. "" );
var_dump($nom); 


echo($biographie. "" );
var_dump($biographie); 

echo($race . "");
var_dump($race); 

echo($armure . "");
var_dump($armure); 

echo($vitesse . "");
var_dump($vitesse); 

echo($initiative . "");
var_dump($initiative); 

echo($dexterite . "");
var_dump($dexterite); 

echo($constitution . "");
var_dump($constitution); 

echo($intelligence . "");
var_dump($intelligence); 

echo($sagesse . "");
var_dump($sagesse); 


echo($force . "");
var_dump($force); 


echo($charisme . "");
var_dump($charisme); 

echo($armes . "");
var_dump($armes);

echo($equipement_capacite . "");
var_dump($equipement_capacite); 


echo($argent . "");
var_dump($argent); 








$db=PDOConnect(); 

//ne pas oublier d'ajouter le nom ,prenom,equipement_arme,dedevie,maitrise et autre dans la bdd a la bdd 


$requete = $db->prepare("UPDATE personnage SET
    nom = :nom,
    prenom = :prenom, 
    biographie = :biographie,
    race = :race,
    pv_max = :pv_max,
    pv = :pv_max,
    armure = :armure,
    argent = :argent,
    vitesse = :vitesse,
    initiative = :initiative,
    `force` = :force, 
    dexterite = :dexterite,
    constitution = :constitution,
    intelligence = :intelligence,
    sagesse = :sagesse,
    charisme = :charisme
WHERE id_uti = :id_uti AND id_partie = :id_partie");

$requete->execute([
    "nom" => $nom,
    "prenom" => $prenom,
    "biographie" => $biographie,
    "race" => $race,
    "pv_max" => $pv_max,
    "pv" => $pv_max,
    "armure" => $armure,
    "argent" => $argent,
    "vitesse" => $vitesse,
    "initiative" => $initiative,
    "force" => $force,
    "dexterite" => $dexterite,
    "constitution" => $constitution,
    "intelligence" => $intelligence,
    "sagesse" => $sagesse,
    "charisme" => $charisme,
    "id_uti" => $_SESSION["id_uti"],
    "id_partie" => $_SESSION["id_partie"]
]);


//ajoute id_talent a personnage pour faire une clé étrangère 

$requete= $db->prepare("UPDATE personnage SET 	
talent_nom = :talent
WHERE id_uti=:id_uti AND id_partie= :id_partie");

$requete->execute([
    "talent"=>$talent,
    "id_uti"=>$_SESSION["id_uti"],
    "id_partie"=>$_SESSION["id_partie"]

]);

//header('location:../campagne/jeu.php');