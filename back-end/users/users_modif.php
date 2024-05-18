<?php $title = 'Modifier l\'utilisateur' . $_GET['id'];

require_once '../script.php';
require_once 'users_script.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('location:index.php' . '?' . 'message=Utilisateur introuvable');
    exit;
}


$bdd = PDOConnect();
$q = 'SELECT id_uti, pseudo, nom, prenom, email, texte_recherche, texte_je_suis, status, biographie, avatar FROM UTILISATEUR WHERE id_uti = :id';
$req = $bdd->prepare($q);
$req->execute([
    'id' => $_GET['id']
]);

$user = $req->fetch(PDO::FETCH_ASSOC);


?>

<head>
    <link rel="stylesheet" href="../css/login.css">
    <?php
    include('../includes/head.php'); ?>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="container d-flex justify-content-center align-items-center my-5">

            <form class="d-flex flex-column my-4 mx-auto bg-body-secondary bg-opacity-75 p-3 rounded-4 login-window" action="verif_users_modif.php" method="POST">
                <h2 class=" text-center my-3">Modification de l'utilisateur <?= $user['pseudo'] ?></h2>

                <div class="form-floating mb-3">
                    <input type="text" name="pseudo" class="form-control" id="floatingPseudo" value="<?= $user['pseudo'] ?>">
                    <label for="floatingPseudo">Pseudo</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="nom" class="form-control" id="floatingNom" value="<?= $user['nom'] ?>">
                    <label for="floatingNom">Nom</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="prenom" class="form-control" id="floatingPrenom" value="<?= $user['prenom'] ?>">
                    <label for="floatingPrenom">Prénom</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingEmail" value="<?= $user['email'] ?>">
                    <label for="floatingEmail">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" name="password" class="form-control" id="floatingPassword">
                    <label for="floatingPassword">Mot de passe</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea type="text" name="texte_recherche" class="form-control" id="floatingRecherche"><?= $user['texte_recherche'] ?></textarea>
                    <label for="floatingRecherche">Texte de recherche</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea type="text" name="texte_je_suis" class="form-control" id="floatingSuis"><?= $user['texte_je_suis'] ?></textarea>
                    <label for="floatingSuis">Texte "Je suis"</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea type="text" name="biographie" class="form-control" id="floatingBiographie"><?= $user['biographie'] ?></textarea>
                    <label for="floatingBiographie">Biographie</label>
                </div>
                <select name="status" class="form-select my-3">
                    <option value="user">Utilisateur</option>
                    <option value="admin">Administrateur</option>
                </select>
                <input type="hidden" name="id_uti" value="<?= $user['id_uti'] ?>">

                    <div class="mb-3">
                        <label for="formFile" class="form-label m-4"><img src="/image/users/<?= $user['avatar'] ?>-1024px.png" width="200px"></label>
                        <input class="form-control" type="file" id="formFile">
                    </div>

                <button class="btn btn-primary align-self-end my-3" type="submit">Modifier</button>
            </form>

        </div>
    </main>

</body>

</html>