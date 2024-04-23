<?php
$title = 'Workshop';

require_once 'workshop_script.php';

// Logs pages visitée
require_once '../script.php';
logPage($title);

// Connexion à la BDD
$bdd = PDOConnect();

include('../includes/head.php');

// Récupérer les tags
$q = 'SELECT nom,description FROM TAG;';
$req = $bdd->prepare($q);
$req->execute([]);
$tags = $req->fetchAll(PDO::FETCH_ASSOC);


// Récupérer les campagnes
$q = 'SELECT id_camp,nom,description,logo,createur FROM CAMPAGNE WHERE brouillon=0 ORDER BY :sort :order;';
$req = $bdd->prepare($q);
$req->execute([

    'sort' => isset($_GET['sort']) && !empty($_GET['sort']) ? $_GET['sort'] : 'name',
    'order' => isset($_GET['order']) && !empty($_GET['order']) ? $_GET['order'] : 'asc',
]);
$campagnes = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <?php include('../includes/header.php'); ?>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col justify-content-between" style="text-align: start;">
                    <a name="back" id="back" class="btn btn-primary bi bi-arrow-left" href="#" role="button"> Retour</a>
                </div>
                <div class="col" style=" text-align: end;">
                    <a name="create" id="buttonCreate" class="btn btn-primary bi bi-plus-circle" href="#" role="button"> Créer</a>

                </div>
            </div>
            <div class="row mt-3">
                <!-- Sidebar -->
                <div class="d-flex flex-column col-3 bg-body-tertiary p-3 rounded-3">
                    <form method="get" action="">
                        <label for="search">Rechercher</label>
                        <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher une campagne">
                        <select name="order" id="order" class="form-select mt-2">
                            <option value="asc">Croissant</option>
                            <option value="desc">Décroissant</option>
                        </select>
                        <select name="sort" id="sort" class="form-select mt-2">
                            <option value="nom" selected>Nom</option>
                        </select>
                        <button type="submit" class="btn btn-primary mt-2">Rechercher</button>
                    </form>
                    <hr>
                    <!-- Tags -->
                    <div class="d-flex flex-column tags">
                        <?php
                        foreach ($tags as $tag) {
                            echo  '<a name="tag" id="tag" class="btn btn-primary mt-3 ';

                            if (isset($_GET[strtolower($tag['nom'])]) && !empty($_GET[strtolower($tag['nom'])]) && $_GET[strtolower($tag['nom'])] == 1)
                                echo 'disabled';
                            else
                                echo 'enabled';

                            echo '" href="' . '?' . strtolower($tag['nom']) . '=1' . '" role="button" title="' . $tag['description'] . '"';

                            echo '>' . $tag['nom'] . '</a>';
                        }

                        ?>
                    </div>
                </div>

                <!-- Campagne -->
                <div class="d-flex col-9 bg-body-tertiary rounded-3 p-3">
                    <?php
                    foreach ($campagnes as $campagne) { ?>
                        <div class="card" style="width: 18rem; height:fit-content">
                            <img src="/image/campagnes/<?= $campagne['logo'] ?>" class="card-img-top" alt="Image de couverture" style="height:11rem">
                            <div class="card-body">
                                <h5 class="card-title"><?= $campagne['nom'] ?></h5>
                                <h6 class="card-subtitle ms-2 text-secondary"><?= $campagne['createur'] ?></h6>
                                <p class="card-text overflow-hidden" style="height: 6rem;"><?= $campagne['description'] ?></p>
                                <a href="#" class="btn btn-primary">Créer une partie</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>