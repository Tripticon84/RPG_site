<?php $title = 'Lobby';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');  

NotConnect();

?>



<body>



<div class="container rounded border bg-body-tertiary">
    <div class="row">
        <!-- Première colonne -->
        <div class="col-md-6 d-flex flex-column"> <!-- d-flex + flex column : avoir une section avec des items a la vertical -->
            <div class="col-md-12 d-flex justify-content-center align-items-center"> <!-- d-flex :transforme la box en container fluid et permet de centré -->
                <h2>Joueur</h2> 
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center"><!-- d-flex :transforme la box en container fluid et permet de centré -->
                <p id="limite_joueur">0/10</p> <!-- nombre de joueur en joueur -->
            </div>
            <!-- Boutons de la première colonne -->
            
            <button type="button" name="empty" id="1" onclick=player() class="btn btn-primary mb-3">Rejoindre Joueur</button> <!-- mb-3 : espacement entre les boutons -->
            <div  class="justify-content-center d-flex">
            <div id="liste_joueur">
                    
            </div>
            </div>
            
        </div>
        
        <!-- Deuxième colonne -->

        <div class="col-md-6  d-flex flex-column"><!-- d-flex + flex column : avoir une section avec des items a la vertical -->
            <div  class="col-md-12 d-flex justify-content-center align-items-center"> <!-- d-flex :transforme la box en container fluid et permet de centré -->
                <h2>Maître du Jeu</h2>
            </div>
            <div class="col-md-12 d-flex justify-content-center align-items-center"><!-- d-flex :transforme la box en container fluid et permet de centré -->
                <p id="limite_mj"> 0/1 </p> <!-- nombre de en mj -->
            </div>
            <!-- Boutons de la deuxième colonne -->
            <button type="button" id="11" onclick=mj() class="btn btn-danger mb-3">Rejoindre Maitre Du Jeu</button>
            <div class="justify-content-center d-flex" id="liste_mj">
                
            </div>
            
        </div>
    </div>
    <div class="row justify-content-end"> <!-- Utilisation de justify-content-end -->
    <a type="submit" href="../fiche/charactersheet.php" class="btn btn-primary mb-3">Suivant</a>
    </div>
</div>






<div class="container rounded border bg-body-secondary">
    <div class="row">
        <div class="col-12 mb-3 text-right">
         <p id="limite_spec">0/10</p> 
            <button type="button" onclick=spec() class="btn btn-primary">Bouton 1</button>
            
            <div class="justify-content-left d-flex" id="liste_spec">
               

            </div>
            

        </div>
    </div>
</div>






<script>

attendre();


</script>
<body>



<footer>
    <?php include('../includes/footer.php');?>
</footer>
</html>
