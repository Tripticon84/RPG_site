<?php $title = 'jeu';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');  
?>

<body>
    
<script src=../js/jeu.js>
</script>
<main>

<div class="container-fluid">
    <div class="row">
        <!-- Grande section -->
        <div class="col-md-8">
            <div class="border bg-primary p-4 my-4">
                <button type="submit" id="enregistrer" onclick="enregistrer()" class="btn btn-secondary mt-2">Enregistrer</button>
                <h2>Campagne</h2>
                <div class="bg-white p-3">
                    <div id="image">
                        <!--affiche une image en fonction de qu'est selectionner a droite dans la liste-->
                    </div> 
                    <div class="col-md-12">
                        <div class="border bg-light p-4 my-4">
                            <h5>Actions</h5>
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-block">Afficher la grille</button>
                                <button type="button" class="btn btn-primary btn-block">Retirer la grille</button>
                                <button type="button" class="btn btn-primary btn-block">Effacer</button>
                                <button type="button" class="btn btn-primary btn-block">Placer</button>
                            </div>
                        </div>
                    </div> <!-- here -->
                </div>
                
            </div>
        </div>
        
        <!-- Map de la campagne -->
        <div class="col-md-4">
            <div class="border bg-light j p-4 my-4">
            <button type="submit" onclick="afficher_plateau_joueur()" class="btn btn-primary  justify-content-right">Montrer la map au joueur</button>
            <button type="submit" onclick="show_plateau()" class="btn btn-primary  justify-content-right">Afficher plateau</button>

                <h2>Map de la campagne</h2>
                
                <div id="map_campagne">
               
                    <!--- génération de code pour afficher un nomre X d'endroit pour la campagne-->
                </div>
            
            </div>
        </div>
    </div>
</div>


<div class="container-fluid d-flex justify-content-left">
<div>
    <!-- Première section -->
    <div class="row">
    <div class="col">
        <div class="bg-secondary p-4 text-center">
            <h2>Première section</h2>
            <!-- 7 boutons alignés horizontalement -->
            <div class="d-flex justify-content-left">
                  <button type="button" onclick=showdescription() class="btn btn-primary mr-2">Note</button>
            </div>
            <!-- Zone de texte en dessous des boutons -->
            <textarea class="form-control mt-4" name ="description" rows="8" placeholder="Grande zone de texte..."></textarea>
        </div>
    </div>
</div>


    
    <!-- Deuxième section -->
    <div class="row mt-4">
    <div class="col">
        <div class="bg-secondary p-4 text-center">
        <div class="d-flex justify-content-left">
                <button type="button" onclick="afficher_creature_mj()"class="btn btn-primary mr-2">Créature X</button>
                <button type="button" onclick="afficher_sorts_mj()" class="btn btn-primary mr-2">Sorts X</button>
                <button type="button" onclick="afficher_equipements_mj()" class="btn btn-primary mr-2">Equipements X</button>
                
                
            
        </div>
            <h2>Deuxième section</h2>
            <!-- 7 boutons alignés horizontalement -->
            <div class="d-flex justify-content-left">
                <button type="button" onclick="afficher_stats_player" class="btn btn-primary mr-2">Equipement</button>
                <button type="button" onclick="afficher_stats_sorts" class="btn btn-primary mr-2">Sorts</button>
                <button type="button" onclick="afficher_stats_histoires" class="btn btn-primary mr-2">Histoires</button>
               
            
            </div>
            <!-- Zone de texte en dessous des boutons -->
            <div class="d-flex justify-content-left" id="info_character">
                
            
                <ul>
                    <li>Nom :<div></div></li>
                    <li>Force :<div></div> </li>
                    <li>Dexterite : <div></div></li>
                    <li>Constitution : <div></div></li>
                    <li>Intelligence : <div></div></li>
                    <li>Sagesse :<div></div> </li>
                    <li>Charisme: <div></div></li>
                </ul>
                
            </div>
        </div>
    </div>  
</div>              
</div>


</main>
<body>

<footer>
    <?php include('../includes/footer.php'); ?>
</footer>


</html>


