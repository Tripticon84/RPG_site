<!DOCTYPE html>
<html lang="Fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    
</head>

<?php $title = 'Profil';
include('././includes/head.php'); ?>

<body>
    <?php include('./includes/header.php'); ?>
    <main class="mt-5">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <!-- Bouton vers l'acceuil   -->
    <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-outline-danger mt-3 ml-3">Accueil</a>
                </div>
            </div>
        </div>
    
        <!-- Bouton vers le profil privé  -->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right mt-3">
      <a href="private.php" class="btn btn-outline-danger">Page privé</a>
    </div>
  </div>
</div>




<div class="container">
  <div class="row">
    <!-- Section grise avec l'image -->
    <div class="col-md-4">
    <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section avec l'image ici -->
        <h2>Avatar</h2>
        <!-- Ajouter un traitement qui va chercher l'image affilié a l'utilisateur dans la BDD -->
        <img src="cheminvers/image.jpg" class="img-fluid" alt="Image">
      </div>
    </div>

    <!-- Deux sections grises à droite de l'image -->
    <div class="col-md-8">
      <div class="row">
        <!-- Première section grise -->
        <div class="col-md-12">
            <div class="rounded p-4 mb-4" style="background-color: #A72020;">
            <!-- Contenu de la première section -->
            <h2>Nom du Profil</h2>
            <p>Contenu de la première section de texte.</p>
          </div>
        </div>

        <!-- Deuxième section grise -->
        <div class="col-md-12">
          <div class="rounded p-4 mb-4" style="background-color: #A72020;">
            <!-- Contenu de la deuxième section -->
            <h2>Ce que les autres joueurs pensent de moi </h2>
            <p>bajkzheoiazjeoizaueioazeapzoeiapzeiapzoiepoaziepoaziepozioeaoea</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="container">
  <div class="row justify-content-center">
    <!-- Section grise à gauche -->
    <div class="col-md-3">
     <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section gauche ici -->
        <h2>Récent</h2>
            <ul>
                <li>Les dragons d'hiver</li>
                <li>Le monstre du lac</li>
                <li>Par Dela les nuages</li>
                <li>Les dragons d'hiver</li>
                <li>Le monstre du lac</li>
                <li>Par Dela les nuages</li>
                
      </div>
    </div>

    <!-- Section grise centrée -->
    <div class="col-md-6">
     <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section centrée ici -->
        <h2>Cherche un groupe pour : </h2>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"></label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <!-- Section grise à gauche -->
    <div class="col-md-3">
      <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section gauche ici -->
        <h2>Raccourcis</h2>
        <!-- Remplacer les href par un traitement php qui n'a pas encore été défini  -->
        <!-- ce dernier ira chercher les campagnes les plus récentes créer /jouer et -->
        <!-- fournira un lien pour y accéder depuis cette page -->
          <li><a href="page_messages_prives.html">Messages privés</a></li>
          <li><a href="page_invitations.html">Voir les invitations</a></li>
          <li><a href="page_listes_campagnes.html">Campagnes voulu</a></li>
          <li><a href="page_messages_prives.html">Messages privés</a></li>
          <li><a href="page_invitations.html">Voir les invitations</a></li>
          <li><a href="page_listes_campagnes.html">Campagnes voulu</a></li>
      </div>
    </div>

    <!-- Section grise centrée -->
    <div class="col-md-6">
      <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section centrée ici -->
        <h2>Je cherche un groupe pour :</h2>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"> </label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <div class="row justify-content-center">
    <!-- Section grise centrée -->
    <div class="col-md-6">
       <div class="rounded p-4 mb-4" style="background-color: #A72020;">
        <!-- Contenu de la section centrée ici -->
        <h2>Biographie : </h2>
        <div class="form-group">
          <label for="exampleFormControlTextarea1"></label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
      </div>
    </div>
  </div>
</div>






    <?php //include('./includes/footer.php');?>
</body>

</html>