<!DOCTYPE html>
<html lang="Fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Règles</title>
    
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    <style>
        /* Personnalisation du style du slider */
        .slick-slide img {
            width: 100%;
        }
    </style>  
    
</head>

<?php $title = 'Règles';
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



        <!-- Bouton vers l'acceuil   -->
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
                    <h2>Règles</h2>
                    <p>Ici , nous vous expliquerons un peu comment se passe les jeux de rôles</p>
                    <p>Puis commment vous amusez au mieux ici !</p>
                </div>
            </div>
        </div>
    </div>

     <!-- Section avec image centrée -->
     <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 center-image">
                <img src="chemin/vers/votre/image.jpg" class="img-fluid" alt="Image Responsive (normalement) du livre">
            </div>
        </div>
    </div>

    <body>
    <!-- Section avec le slider -->
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="slider">
                    <div><img src="image1.jpg" alt="Image 1"></div>
                    <div><img src="image2.jpg" alt="Image 2"></div>
                    <div><img src="image3.jpg" alt="Image 3"></div>
                    <!-- Ajoutez plus de divs avec des images selon vos besoins -->
                </div>
            </div>
        </div>
    </div>

    <!-- Ajouter les bibliothèques JavaScript nécessaires  pour le caroussel-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Ajouter slick-carousel JS -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script>
        // Initialiser le slider avec des options de configuration
        $(document).ready(function(){
            $('.slider').slick({
                dots: true, // Afficher les points de navigation
                autoplay: true, // Activer le mode de lecture automatique
                autoplaySpeed: 2000 // Vitesse de transition en millisecondes
            });
        });
    </script>



<div class="container mt-4">
        <div class="row">
            <!-- Colonne pour le premier titre et paragraphe -->
            <div class="col-md-6">
                <h2>Essayer ,vous verrez !</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum dolor in magna pharetra, vel feugiat lacus consequat. Vivamus tincidunt eros et orci placerat tincidunt.</p>
            </div>
            <!-- Colonne pour le deuxième titre et paragraphe -->
            <div class="col-md-6">
                <h2>Plus d'information</h2>
                <p>Duis vel libero eu justo ultricies laoreet. Cras bibendum, odio et interdum vulputate, elit nulla commodo felis, vitae malesuada lacus lorem eget tortor. Quisque luctus augue nec arcu varius, eu tincidunt tortor consequat.</p>
            </div>
        </div>
    </div>


    <?php //include('./includes/footer.php');?>
</body>

</html>