<?php $title = 'Lobby';
include('script.php');
include('includes/head.php'); 
include('includes/header.php');  

if (!isset($_SESSION['id_uti'])) {
    // Redirige vers l'acceuil
    header("Location: index.php");
    exit; 
} 

?>



<body>


<div class="container rounded border bg-light">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6 d-flex flex-column"> <!-- d-flex + flex column : avoir une section avec des items a la vertical -->
            <div class="col-md-12 d-flex justify-content-center align-items-center"> <!-- d-flex :transforme la box en container fluid et permet de centré -->
                <h2>Joueurs</h2> 
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center"><!-- d-flex :transforme la box en container fluid et permet de centré -->
                <p> 0/5</p> <!-- nombre de joueur en joueur -->
            </div>
            <!-- Boutons de la première colonne -->
            <button type="button" class="btn btn-primary mb-3">Bouton 1</button> <!-- mb-3 : espacement entre les boutons -->
            <button type="button" class="btn btn-secondary mb-3">Bouton 2</button>
            <button type="button" class="btn btn-success mb-3">Bouton 3</button>
        </div>
        
        <!-- Deuxième colonne -->

        <div class="col-md-6  d-flex flex-column"><!-- d-flex + flex column : avoir une section avec des items a la vertical -->
            <div class="col-md-12 d-flex justify-content-center align-items-center"><!-- d-flex :transforme la box en container fluid et permet de centré -->
                <h2>Maître du Jeu</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center"><!-- d-flex :transforme la box en container fluid et permet de centré -->
                <p> 0/1 </p> <!-- nombre de en mj -->
            </div>
            <!-- Boutons de la deuxième colonne -->
            <button type="button" class="btn btn-danger mb-3">Bouton 4</button>
            <button type="button" class="btn btn-warning mb-3">Bouton 5</button>
            <button type="button" class="btn btn-info mb-3">Bouton 6</button>
        </div>
    </div>
    <div class="row justify-content-end"> <!-- Utilisation de justify-content-end -->
    <button type="button flex" class="btn btn-primary mb-3">Suivant</button>
    </div>
</div>






<div class="container rounded border bg-light">
    <div class="row">
        <div>
            <h5>En attente de ...</h5> <p> 8/8</p> <!-- nombre de en spectateur -->
        </div>
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-primary btn-block">Bouton 1</button>
        </div>
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-secondary btn-block">Bouton 2</button>
        </div>
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-success btn-block">Bouton 3</button>
        </div>
    </div>
    <div class="row">
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-primary btn-block">Bouton 4</button>
        </div>
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-secondary btn-block">Bouton 5</button>
        </div>
        <div class="col-4 mb-3 text-center">
            <button type="button" class="btn btn-success btn-block">Bouton 6</button>
        </div>
    </div>
</div>



<body>



<footer>
    <?php include('includes/footer.php');?>
</footer>
</html>
