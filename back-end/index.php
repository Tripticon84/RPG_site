<?php $title = 'Accueil';
include('./includes/head.php');
require_once('script.php') ?>

<?php
$bdd = PDOConnect();

$q = 'SELECT COUNT(id_uti) FROM UTILISATEUR';
$req = $bdd->prepare($q);
$req->execute();
$users = $req->fetch();

$q = 'SELECT COUNT(id_camp) FROM CAMPAGNE';
$req = $bdd->prepare($q);
$req->execute();
$campaigns = $req->fetch();


$used_storage = variant_round((disk_free_space("/") / 1024 / 1024 / 1024 * 20) /476.15,2);
$storage = 20;
?>


<body>
    <?php include('./includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include('./includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col rounded rounded-4 bg-danger p-3">
                        <div class="row align-items-center gy-3">
                            <div class="col d-flex align-items-start">
                                <i class="bi bi-map bi-quickinfo h1 m-2"></i>
                                <div>
                                    <div class="col fs-5 fw-bold">Campagnes</div>
                                    <div class="col fs-5"><?= $campaigns[0] ?></div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-start">
                                <i class="bi bi-map bi-question-lg h1 m-2"></i>
                                <div>
                                    <div class="col fs-5 fw-bold">Requêtes</div>
                                    <div class="col fs-5">????</div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-start">
                                <i class="bi bi-person h1 m-2"></i>
                                <div>
                                    <div class="col fs-5 fw-bold">Utilisateurs</div>
                                    <div class="col fs-5"><?= $users[0] ?></div>
                                </div>
                            </div>
                            <div class="col d-flex align-items-start">
                                <i class="bi bi-device-hdd h1 m-2"></i>
                                <div>
                                    <div class="col fs-5 fw-bold">Stockage</div>
                                    <div class="col fs-5"><?= $used_storage . ' / ' . $storage . ' Go' ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3 m-2 mt-5">
                    <div class="col-md-7 ms-sm-auto ms-md-0 bg-info h-100 p-3 rounded rounded-4">
                        <h4 class="fw-bold mb-3">Graphique</h4>
                        <img src="./img/chart.svg" width="100%">

                    </div>



                    <div class="col-md-4 offset-md-1 p-3 bg-success rounded rounded-4">
                        <h4 class="fw-bold mb-3">Activités</h4>
                        <div class="flex-column">
                            <div>
                                <a href="#" class="d-inline-block text-decoration-none mb-2">
                                    <img src="https://github.com/Tripticon84.png" alt="Yann" class="rounded-circle" width="42" height="42">
                                    <span class="fw-bold text-dark ms-2">Yann Cordonnier</span>
                                </a>
                                <div class="ms-md-3 ms-sm-0">
                                    A créer une nouvelle campagne : Warhammer
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="d-inline-block text-decoration-none mb-2">
                                    <img src="https://github.com/Tripticon84.png" alt="Yann" class="rounded-circle" width="42" height="42">
                                    <span class="fw-bold text-dark ms-2">Yann Cordonnier</span>
                                </a>
                                <div class="ms-md-3 ms-sm-0">
                                    A créer une nouvelle campagne : Warhammer
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="d-inline-block text-decoration-none mb-2">
                                    <img src="https://github.com/Tripticon84.png" alt="Yann" class="rounded-circle" width="42" height="42">
                                    <span class="fw-bold text-dark ms-2">Yann Cordonnier</span>
                                </a>
                                <div class="ms-md-3 ms-sm-0">
                                    A créer une nouvelle campagne : Warhammer
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="d-inline-block text-decoration-none mb-2">
                                    <img src="https://github.com/Tripticon84.png" alt="Yann" class="rounded-circle" width="42" height="42">
                                    <span class="fw-bold text-dark ms-2">Yann Cordonnier</span>
                                </a>
                                <div class="ms-md-3 ms-sm-0">
                                    A créer une nouvelle campagne : Warhammer
                                </div>
                            </div>
                            <hr>
                            <div>
                                <a href="#" class="d-inline-block text-decoration-none mb-2">
                                    <img src="https://github.com/Tripticon84.png" alt="Yann" class="rounded-circle" width="42" height="42">
                                    <span class="fw-bold text-dark ms-2">Yann Cordonnier</span>
                                </a>
                                <div class="ms-md-3 ms-sm-0">
                                    A créer une nouvelle campagne : Warhammer
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>

</html>