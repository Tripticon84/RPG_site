<?php
require_once '../script.php';

function usersList()
{

    $bdd = PDOConnect();

    $q = 'SELECT id_uti,pseudo,email,nom,prenom,status FROM utilisateur ORDER BY id_uti ASC';

    $req = $bdd->prepare($q);

    $req->execute();

    $users = $req->fetchAll();

    return $users;
}

function usersDelete($id)
{

    $bdd = PDOConnect();

    $q = 'DELETE FROM captcha WHERE id_captcha = :id';

    $req = $bdd->prepare($q);

    $req->execute([
        'id' => $id,
    ]);
}

function usersAdd($pseudo, $email, $password, $nom, $prenom, $status)
{

    $bdd = PDOConnect();

    $q = 'INSERT INTO utilisateur (pseudo, email, password, nom, prenom, status) VALUES (:pseudo, :email, :password, :nom, :prenom, :status)';

    $req = $bdd->prepare($q);

    $req->execute([
        'pseudo' => $pseudo,
        'email' => $email,
        'password' => $password,
        'nom' => $nom,
        'prenom' => $prenom,
        'status' => $status,
    ]);
}


// Si l'action est 'delete' et que l'id est défini > supprimer l'utilisateur
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    usersDelete($_GET['id']);
    header('location:index.php' . '?' . 'success=Utilisateur supprimé');
}

// Si l'action est 'add' et que tout les champs sont définies et non vide > ajouter l'utilisateur
if (
    isset($_GET['pseudo']) 
    && isset($_GET['email']) 
    && isset($_GET['password']) 
    && isset($_GET['nom']) 
    && isset($_GET['prenom'])
    && isset($_GET['status'])
    && !empty($_GET['pseudo']) 
    && !empty($_GET['email'])
    && !empty($_GET['password'])
    && !empty($_GET['nom'])
    && !empty($_GET['prenom'])
    && !empty($_GET['status'])) {

    // Vérifier si l'email n’existe pas déjà dans la BDD
    foreach (usersList() as $user) {
        if ($user['email'] == $_GET['email']) {
            header('location:index.php' . '?' . 'message=Cet email est déjà inscrit.');
            exit;
        }
    }


    usersAdd($_GET['pseudo'], $_GET['email'], $_GET['password'], $_GET['nom'], $_GET['prenom'], $_GET['status'] == 'User' ? 0 : 1);
    header('location:index.php' . '?' . 'success=Utilisateur ajouté');
}
