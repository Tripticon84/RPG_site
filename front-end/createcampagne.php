<?php $title = 'Créer votre campagne';
include('script.php');
include('includes/head.php'); 
include('includes/header.php');  
?>

<body>


<div class="container-fluid">
    <div class="row">
        <!-- Grande section -->
        <div class="col-md-8">
            <div class="border bg-primary p-4 my-4">
                <button type="submit" id="enregistrer" class="btn btn-primary mt-2">Enregistrer</button>
                <h2>Création de campagne</h2>
                <div class="bg-white p-3">
                    <?php
                    // PHP pour afficher l'image
                    echo '<img src="cheminversimage.jpg" alt="Image de la campagne">'; //affiche une image en fonction de qu'est selectionner a droite dans la liste
                    ?>
                    <div class="col-md-12">
                        <div class="border bg-light p-4 my-4">
                            <h2>Actions</h2>
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
            <div class="border bg-light p-4 my-4">
                <h2>Map de la campagne</h2>
            <ul>
                <li>blabla</li>
                <li>Mes invitations</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>
                <li>Liste de souhaits</li>

            </ul>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Première section -->
    <div class="row">
    <div class="col">
        <div class="bg-secondary p-4 text-center">
            <h2>Première section</h2>
            <!-- 7 boutons alignés horizontalement -->
            <div class="d-flex justify-content-left">
                <button type="button" class="btn btn-primary mr-2">Scénario</button>
                <button type="button" class="btn btn-primary mr-2">Bestiaires</button>
                <button type="button" class="btn btn-primary mr-2">Sorts</button>
                <button type="button" class="btn btn-primary mr-2">Note</button>
                <button type="button" class="btn btn-primary">Bouton 7</button>
            </div>
            <!-- Zone de texte en dessous des boutons -->
            <textarea class="form-control mt-4" name ="Description" rows="8" placeholder="Grande zone de texte..."></textarea>
        </div>
    </div>
</div>
    
    <!-- Deuxième section -->
    <div class="row mt-4">
    <div class="col">
        <div class="bg-secondary p-4 text-center">
        <div class="d-flex justify-content-left">
                <button type="button" class="btn btn-primary mr-2">Créature X</button>
                <button type="button" class="btn btn-primary mr-2">Sorts X</button>
                <button type="button" class="btn btn-primary mr-2">Equipements X</button>
                <button type="button" class="btn btn-primary mr-2">Note</button>
            
        </div>
            <h2>Deuxième section</h2>
            <!-- 7 boutons alignés horizontalement -->
            <div class="d-flex justify-content-left">
                <button type="button" class="btn btn-primary mr-2">Equipement</button>
                <button type="button" class="btn btn-primary mr-2">Sorts</button>
                <button type="button" class="btn btn-primary mr-2">Histoires</button>
                <button type="button" class="btn btn-primary mr-2">Note</button>
            
            </div>
            <!-- Zone de texte en dessous des boutons -->
            <div class="d-flex justify-content-left">
            
                <ul>
                    <li>Nom :</li>
                    <li>Force : </li>
                    <li>Dex : </li>
                    <li>Constitution : </li>
                    <li>Intelligence : </li>
                    <li>Sagesse : </li>
                    <li>Charisme: </li>
                </ul>
            
            </div>
        </div>
    </div>
</div>              



<body>

<footer>
    <?php include('includes/footer.php'); ?>
<footer>


</html>


