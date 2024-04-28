<?php
include('script.php');
include('includes/head.php');  
include('includes/header.php');  



/*
if (!isset($_SESSION['id_uti'])) {
    // Redirige vers l'acceuil
    header("Location: index.php");
    exit; 
}  */

// Récupère l'ID de l'utilisateur depuis la session
$id = $_SESSION['id_uti'];



 

// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Récupère les données du formulaire
    // Association des post a des variables
    $pseudo = $_POST["pseudo"];
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $email = $_POST["email"];
    $ancientpassword = $_POST['ancientpassword'];
    $newpassword = $_POST['newpassword'];
    $verify = $_POST['verifypassword'];
  



    

    // Connexion à la base de données avec PDO
    try {
        
        $db=PDOConnect(); //connexion a la db

        // Prépare et exécute la requête SQL pour mettre à jour le pseudo de l'utilisateur
        
        if(!empty($prenom)){
        $requete2 = $db->prepare('UPDATE utilisateur SET prenom = :prenom WHERE id_uti = :id'); //prépare la requête modifiant le le prénom
        $requete2->execute([
            'prenom' => $prenom, 
            'id' =>$id 
         ]);

        }


        if(!empty($nom)){
        $requete3 = $db->prepare('UPDATE utilisateur SET nom = :nom WHERE id_uti = :id');  //prépare la requête modifiant le nom
        $requete3->execute([
            'nom' => $nom, 
            'id' =>$id 
         ]);
        }
       
         


// Écrire la requête SELECT à trous
$q = 'SELECT id_uti,pseudo FROM UTILISATEUR WHERE pseudo = :pseudo AND id_uti != :id'; //selectionne le pseudo pour tous utilisateur qui n'est pas celui qui écrit la requête 

// Préparer la requête
$requete5 = $db->prepare($q);

// Exécuter la requête 
$requete5->execute([
    'pseudo' => $_POST['pseudo'],
    'id' => $_SESSION['id_uti']
]);

// Récupérer les résultats dans un tableau $results
$results = $requete5->fetchAll();


if (!empty($_POST['pseudo'])){
// Si il existe un même pseudo > redirection
    if (!empty($results) && $results[0]['pseudo'] == $_POST['pseudo'] ) {
            header('location:private.php' . '?' . 'message=Pseudo déjà utilisé.');
            exit;
        } 
        else{    
        $requete = $db->prepare('UPDATE utilisateur SET pseudo = :pseudo WHERE id_uti = :id');  //prépare la requête modifiant le pseudo
        $requete->execute([
        'pseudo' => $pseudo, 
        'id' =>$id 
        ]);
        $_SESSION['pseudo'] = $_POST['pseudo']; //actualise la session pour y mettre le nouvelle pseudo
    }
}//fin du !empty pseudo



if(!empty($_POST['email'])){


    $q2 = 'SELECT id_uti,email FROM UTILISATEUR WHERE email = :email AND id_uti != :id'; //selectionne l'email pour tous utilisateur qui n'est pas celui qui écrit la requête 
    
    // Préparer la requête
    $req2 = $db->prepare($q2);

    // Exécuter la requête 
    $req2->execute([
    'email' => $_POST['email'],
    'id' => $_SESSION['id_uti']
    ]);

    // Récupérer les résultats dans un tableau $results
    $results2 = $req2->fetchAll();


 // Si il existe un même email > redirection
if (!empty($results2) && $results2[0]['email'] == $_POST['email']
    || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)
    ) 
    {
    header('location:private.php' . '?' . 'message=Email déjà utilisé ou invalide.');
    exit;
}//fin du if

else{  
    $requete4 = $db->prepare('UPDATE utilisateur SET email = :email WHERE id_uti = :id');  //prépare la requête modifiant l'email
    $requete4->execute([
            'email' => $email, 
            'id' =>$id 
         ]);
        $_SESSION['email'] = $_POST['email']; //actualise la session pour y mettre le nouvelle e-mail
    }//fin du else

} //fin du !empty email





if (!empty($ancientpassword) && !empty($newpassword) && !empty($verify)){



    
// Si le mot de passe ne fait pas entre 8 et 16 caractères > Redirection avec une erreur
if (strlen($_POST['newpassword']) <= 8 || strlen($_POST['newpassword']) > 100) {
    header('location:private.php' . '?' . 'message=Le mot de passe doit être compris 8 et 100 caractères.');
    exit;
}


// Si le mot de passe ne possède pas au moins 1 lettre minuscule
if (!preg_match('@[a-z]@', $_POST['newpassword'])) {
    header('location:sign-up.php' . '?' . 'message=Le mot de passe doit contenir au moins une lettre minuscule.');
    exit;
}

// Si le mot de passe ne possède pas au moins 1 lettre majuscule
if (!preg_match('@[A-Z]@', $_POST['newpassword'])) {
    header('location:private.php' . '?' . 'message=Le mot de passe doit contenir au moins une lettre majuscule.');
    exit;
}

// Si le mot de passe ne possède pas au moins 1 chiffre
if (!preg_match('@[0-9]@', $_POST['newpassword'])) {
    header('location:private.php' . '?' . 'message=Le mot de passe doit contenir au moins un chiffre.');
    exit;
}

// Si le mot de passe ne possède pas de caractère spécial
if (!preg_match('@[^\w]@', $_POST['newpassword'])) {

    header('location:private.php' . '?' . 'message=Le mot de passe doit contenir au moins un caractère spécial.');
    exit;
}


// Si le mot de passe ne correspond pas au mot de passe de confirmation
if ($newpassword != $verify) {
    header('location:private.php' . '?' . 'message=Les mots de passes ne correspondent pas.');
    exit;
}

    

$requete6 = $db->prepare('SELECT password FROM UTILISATEUR WHERE id_uti=:id'); //selectionne le mot de passe de l'utilisateur courant
$requete6->execute([
    'id' =>$id 
 ]);
 $password=$requete6->fetch(PDO::FETCH_ASSOC);
 $passwordactual=$password['password']; //le mot de passe actuel de l'utilisateur dans la bdd

//fonction de hachage du mdp de ce que l'utilisateur vient de poster dans "ancient mot de passe"
$salt = 'JimmyRohanYann';
$pass_salt = $ancientpassword . $salt;
$pass_hash = hash('sha256', $pass_salt);

 if( $pass_hash != $passwordactual ){// Si le mot de passe poster est différent de celui dans la bdd (une fois les deux hasher et comparé) erreur

    header('location:private.php' . '?' . 'message=Mauvais ancient mot de passe.');
    exit;

 } else {
    //hache le nouveau mot de passe avant de le mettre dans la bdd
    $pass_salt=$newpassword . $salt ;
    $pass_hash = hash('sha256', $pass_salt);
  
    $requete7 = $db->prepare('UPDATE utilisateur SET password = :password WHERE id_uti = :id');

    $requete7->execute([
        'id' => $id,
        'password'=>$pass_hash //nouveau mot de passe hasher
    ]);

 }

}




        
    // Redirige vers une page de confirmation ou de profil après la mise à jour
    header("Location: private.php");
        exit; // Arrête l'exécution du script après la redirection
    } catch (PDOException $e) {
        // En cas d'erreur, affiche un message d'erreur
        echo "Erreur : " . $e->getMessage();
    }
}


?>
