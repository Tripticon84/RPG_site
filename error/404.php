<?php $title = 'Page introuvable';
require_once '../front-end/includes/head.php';

require_once '../front-end/includes/header.php';

?>

<div class="container">
    <div class="row">
        <div class="col-md-12 text-center" style="margin-top:10%">
            <div class="" style="font-size:1000%;">404</div>
            <p class="text-center">Il semble que tu te sois perdu <?= isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : '' ?></p>
            <a href="/front-end/" class="btn btn-primary">Retour à l'accueil</a>
        </div>
    </div>
</div>