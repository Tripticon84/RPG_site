<!DOCTYPE html>
<html lang="Fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <style>
        /* Personnalisation du style du slider */
        .slick-slide img {
            width: 100%;
        }
    </style>  
    
</head>

<?php $title = 'FAQ';
include('././includes/head.php');
// Log de la page visitée
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/script.php';
logPage($title);
?>

<body>
    <?php include('./includes/header.php'); ?>
    <main class="mt-5">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



        <!-- Bouton vers l’accueil   -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-outline-danger mt-3 ml-3">Accueil</a>
                </div>
            </div>
        </div>
    
      <!-- Section avec texte centrée -->
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="text-center">
                    <h2>Support FAQ</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum dolor in magna pharetra, vel feugiat lacus consequat. Vivamus tincidunt eros et orci placerat tincidunt.</p>
                    
                </div>
            </div>
        </div>
    </div>

     <!-- Section avec image centrée -->
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 center-image">
                <img src="chemin/vers/votre/image.jpg" class="img-fluid" alt="Image Responsive (normalement) des deux mains">
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Colonne pour le premier titre et paragraphe -->
            <div class="col-md-6">
                <h2>Titre 1</h2>
                <p>Paragraphe 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum dolor in magna pharetra, vel feugiat lacus consequat. Vivamus tincidunt eros et orci placerat tincidunt.</p>
            </div>
            <!-- Colonne pour le deuxième titre et paragraphe -->
            <div class="col-md-6">
                <h2>Titre 2</h2>
                <p>Paragraphe 2. Duis vel libero eu justo ultricies laoreet. Cras bibendum, odio et interdum vulputate, elit nulla commodo felis, vitae malesuada lacus lorem eget tortor. Quisque luctus augue nec arcu varius, eu tincidunt tortor consequat.</p>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <!-- Colonne pour l'image centrée -->
            <div class="col-md-6 text-center">
                <img src="votre_image.jpg" class="img-fluid" alt="Image">
            </div>
        </div>
        <div class="row mt-4">
            <!-- Colonne pour les boutons -->
            <div class="col-md-6">
                <!-- Premier bouton -->
                <button type="button" class="btn btn-primary btn-block">Contactez-nous</button>
            </div>
            <div class="col-md-6">
                <!-- Deuxième bouton -->
                <button type="button" class="btn btn-primary btn-block">Signaler un problème</button>
            </div>
        </div>
    </div>

   



<!-- Bibliothèque Font Awesome pour les icônes -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <!-- Titre cliquable -->
                <h2 data-toggle="collapse" href="#texteCache" role="button" aria-expanded="false" aria-controls="texteCache">
                    Question récurente <i class="fas fa-chevron-down"></i>
                </h2>
                <!-- Paragraphe de texte caché -->
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <!-- Titre cliquable -->
                <h2 data-toggle="collapse" href="#texteCache" role="button" aria-expanded="false" aria-controls="texteCache">
                    Question récurente <i class="fas fa-chevron-down"></i>
                </h2>
                <!-- Paragraphe de texte caché -->
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
            </div>
        </div>
    </div>
<div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <!-- Titre cliquable -->
                <h2 data-toggle="collapse" href="#texteCache" role="button" aria-expanded="false" aria-controls="texteCache">
                    Question récurente <i class="fas fa-chevron-down"></i>
                </h2>
                <!-- Paragraphe de texte caché -->
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
                <div class="collapse" id="texteCache">
                    <h4>Sous sujet</h4>
                    <p>Réponse a la question</p>
                </div>
            </div>
        </div>
    </div>
        
   

    <?php //include('./includes/footer.php');?>
</body>

</html>