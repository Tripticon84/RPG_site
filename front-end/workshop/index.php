<?php
$title = 'Workshop';

require_once 'workshop_search.php';

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

?>

<body>
    <?php include('../includes/header.php'); ?>
    <main class="mt-4">
        <div class="container">
            <div class="row">
                <!-- <div class="col justify-content-between" style="text-align: start;">
                    <a name="back" id="back" class="btn btn-primary bi bi-arrow-left" href="#" role="button"> Retour</a>
                </div> -->
                <!-- <div class="col" style=" text-align: end;">
                    <a name="create" id="buttonCreate" class="btn btn-primary bi bi-plus-circle" href="../campagne/create_campagne.php" role="button"> Créer une campagne</a>
                </div> -->
            </div>
            <div class="row mt-3 mb-5 rounded-3 bg-body-secondary">
                <!-- Sidebar -->
                <div class="d-flex flex-column col-12 col-md-3 p-3 ">
                    <label for="search">Rechercher</label>
                    <input type="text" name="search" id="search" class="form-control" placeholder="Rechercher une campagne" oninput="searchCampaigns()">
                    <select name="sort" id="sort" class="form-select mt-2" oninput="searchCampaigns()">
                        <option value="nom" selected>Nom</option>
                    </select>
                    <select name="order" id="order" class="form-select mt-2" oninput="searchCampaigns()">
                        <option value="asc">Croissant</option>
                        <option value="desc">Décroissant</option>
                    </select>
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
                <div class="d-flex flex-column flex-md-row col-md-9 col-12 p-3 flex-wrap align-content-center align-content-md-start" id="result">

                </div>
            </div>
        </div>
        <script>
            searchCampaigns();
        </script>
    </main>
    <?php include('../includes/footer.php'); ?>
</body>