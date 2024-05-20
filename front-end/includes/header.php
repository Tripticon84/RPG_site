<?php session_start(); 
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/script.php';

$bdd = PDOConnect();
if (isset($_SESSION['email'])) {
  $q = 'SELECT id_uti,pseudo,avatar FROM UTILISATEUR WHERE email = :email';
  $req = $bdd->prepare($q);
  $req->execute([
    'email' => $_SESSION['email']
  ]);
  $user = $req->fetch(PDO::FETCH_ASSOC);
}
?>
<head>
  <link rel="stylesheet" href="/front-end/css/header.css">
  <script src="/front-end/js/header.js"></script>

<header class="bg-body-tertiary">
  <nav class="navbar navbar-expand-sm bg-body-tertiary sticky-top border-bottom border-1 border-black">
    <div class="container-fluid justify-content-between text-nowrap flex-sm-wrap"">
      <div class="d-flex align-items-center flex-sm-wrap">
      <a href="#" class="navbar-brand">
        <img src="/front-end/img/logo256px.png" alt="logo" height="150px">
        <span class="text-decoration-none m-1 fw-bold d-none d-sm-inline">Roll of Odyssey</span>
      </a>

      <!-- NavBar / OffCanvas -->
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link" aria-current="page" href="/front-end/index.php">Accueil</a>
            </li>
            <?php
            if (isset($_SESSION['email'])) { ?>
              <li class="nav-item">
                <a href="workshop/index.php" class="nav-link">Workshop</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="#" class="nav-link">Règles</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Support</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">À propos</a>
            </li>
          </ul>
      </div>
      <div>
          <!-- Boutons login -->
          <?php
          if (isset($_SESSION['email'])) { ?>

            <div class="dropdown">
              <a href="#" class="d-block text-decoration-none me-5 dropbtn dropdown-toggle" onclick="dropdown()">
                <img src="/image/users/<?= $user['avatar'] == NULL ? 'default' : $user['avatar'] ?>-64px.png" alt="mdo" width="32" height="32" class="rounded-circle">
              </a>
              <ul class="dropdown-content rounded-3 m-0" id="dropdownHeader">
                <li><a class="dropdown-item bi bi-person" href="/front-end/profile/profil.php"> Profil</a></li>
                <li><a class="dropdown-item bi bi-map" href="/front-end/campagne/campagne.php"> Mes campagnes</a></li>
                <li><a class="dropdown-item bi bi-gear" href="/front-end/profile/private.php"> Paramètres</a></li>
                <li><a class="dropdown-item" href="#">  XX</a></li>
                <hr class="my-1">
                <li><a class="dropdown-item bi bi-door-open" href="/front-end/login/logout.php">  Déconnexion</a></li>
              </ul>
            </div>
            

          <?php  } else { ?>
            <ul class="navbar-nav">
              <li class="nav-item mx-2">
                <a id="sign-up" class="btn btn-primary fw-bold" href="/front-end/login/sign-up.php" role="button">S'inscrire</a>
              </li>
              <li class="nav-item mx-2">
                <a id="log-in" class="btn btn-outline-primary fw-bold" href="/front-end/login/sign-in.php" role="button">Se connecter</a>
              </li>
            </ul>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
</header>