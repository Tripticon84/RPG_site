<?php
$title = 'PDF';
/*
// include($_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/head.php');
// include($_SERVER['DOCUMENT_ROOT'] . '/front-end/script.php'); ?>
<?php

// Récupération des informations de l'utilisateur

// $bdd = PDOConnect();

// Infos utilisateur
$q = 'SELECT id_uti, pseudo, nom, prenom, email, texte_recherche, texte_je_suis, avatar, biographie FROM UTILISATEUR WHERE id_uti = :id';
$req = $bdd->prepare($q);
$req->execute(['id' => $_GET['user']]);
$user = $req->fetch(PDO::FETCH_ASSOC);

$user['avatar'] = empty($user['avatar']) ? 'default' : $user['avatar'];

// Inscription à la newsletter
$q = 'SELECT id_newsletter_list FROM NEWSLETTER_LIST WHERE email = :email';
$req = $bdd->prepare($q);
$req->execute(['email' => $user['email']]);
$newsletter = $req->fetch(PDO::FETCH_ASSOC);

// Campagnes créées
$q = 'SELECT id_camp, logo, nom, description, createur FROM CAMPAGNE WHERE createur = :id';
$req = $bdd->prepare($q);
$req->execute(['id' => $_GET['user']]);
$campagnes = $req->fetchAll(PDO::FETCH_ASSOC);
*/
?>

<style>
    .rouge {
        color: red;
    }
</style>

<body class="p-3">
    <div class="container">
        <h1 class="text-center fw-bold">Données de <?= $user['pseudo'] ?></h1>

        <h2 class="fw-bold mt-5">Informations sur l’utilisateur</h2>
        <ul>
            <li class="my-3">Id : <span class="fw-bold"><?= $user['id_uti'] ?></span></li>
            <li class="my-3">Nom : <span class="fw-bold"><?= $user['nom'] ?></span></li>
            <li class="my-3">Prénom : <span class="fw-bold"><?= $user['prenom'] ?></span></li>
            <li class="my-3">Email : <span class="fw-bold"><?= $user['email'] ?></span></li>
            <li class="my-3">Texte de recherche : <span class="fw-bold"><?= empty($user['texte_recherche']) ? '<span class="rouge">Vide</span>' : $user['texte_recherche'] ?></span></li>
            <li class="my-3">Texte de présentation : <span class="fw-bold"><?= empty($user['texte_je_suis']) ? '<span class="rouge">Vide</span>' : $user['texte_je_suis'] ?></span></li>
            <li class="my-3">Biographie : <span class="fw-bold"><?= empty($user['biographie']) ? '<span class="rouge">Vide</span>' : $user['biographie'] ?></span></li>
        </ul>
        <h3 class="fw-bold mt-4">Avatar :</h3>
        <?php 
            $base64 = base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/image/users/' . $user['avatar'].'-1024px.png')); ?>
        <img src="<?= 'data:image/png;base64,' . $base64 ?>" alt="Avatar de <?= $user['pseudo'] ?>" class="img-fluid" width="250px">

        <h3 class="mt-4 fw-bold">Newsletter</h3>
        <p class="">Inscrit à la newsletter : <span class="fw-bold"><?= $newsletter ? 'Oui' : 'Non' ?></span></p>

        <h2 class="fw-bold mt-5">Campagnes créées</h2>
        <div class=" d-flex my-3">
            <?php foreach ($campagnes as $campagne) : ?>
                <?php
                    $base64 = base64_encode(file_get_contents($_SERVER['DOCUMENT_ROOT'] . '/image/campagnes/' . $campagne['logo']));
                    ?>

                <div class="card" style="width: 18rem; height:fit-content">
                    <img src="data:image/png;base64,<?=$base64?>" class="card-img-top" alt="Image de couverture" style="height:11rem" />
                    <div class="card-body">
                        <h5 class="card-title fw-bold"><?= $campagne['nom'] ?></h5>
                        <p class="card-text overflow-auto"><?= $campagne['description'] ?></p>

                    </div>
                </div>
            <?php endforeach; ?>

        </div>
</body>
</html>