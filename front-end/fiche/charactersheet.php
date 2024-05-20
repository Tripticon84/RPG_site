<?php 

$title = 'Fiche de personnage';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');

?>
 

<body>


<main>
<form method="POST" action="check.php">
<div class="container">
    
    

        <div>
        <button type="button"  id="avatar"  class="btn btn-primary mb-3">+</button> 

        </div>

        <div>
        <input name= "nom" id="nom" label="Nom" placeholder="Nom"></input>
        <input name="prenom" id="prenom" label="Prenom" placeholder="Prenom"></input>
        <input name="race" id="race" label="race" placeholder="Race"></input>

        </div>

   
</div>
   

</div>




<div class= "container">
    
    <div class="mb-2  my-5"  id="statistiques">
        <p id="point">Limite de point : </p>
        <input name="force" label="Force" placeholder="Force"></input>
        <input name="dexterite" label="Dextérité" placeholder="Dextérité"></input>
        <input name="constitution" label="Constituion" placeholder="Constituion"></input>
        <input name="intelligence" label="Intelligence" placeholder="Intelligence"></input>
        <input name="sagesse" label="Sagesse" placeholder="Sagesse"></input>
        <input name="charisme" label="Charisme" placeholder="Charisme"></input>
    </div>
    
</div>








<div class="container">

  <div class="row justify-content-center">
    <div class="col-md-6">
    
        <div>
        
        <input name="maitrise" id="maitrise" placeholder="Maîtrise"></input>
        <input name="inspiration" id="inspiration" placeholder=" Inspiration"></input>
        <input name="sagesse_passive" id="sagessep" placeholder="Sagesse passive"></input>

        </div>

        <div>
        <label for="talent">Choisissez une option :</label>
        <select id="talent" name="talent">
            <option value="acrobatie">Acrobatie</option>
            <option value="escamotage">Escamotage</option>
            <option value="genie_du_mal">Génie du mal</option>
        </select>
        </div>

        <div id="boost">
            <input name ="argent" id ="argent" placeholder="PO"></input>
            <input id="pa" placeholder="PA"></input>
            <input id="pc" placeholder="PC"></input>      

        </div>
   
    </div>
        
    <div class="col-md-6">
  
        <div>
        <input name="initiative" id="initiative" placeholder="Initiative"></input>
        <input name="armure"  id="ca" placeholder=" CA"></input>
        <input name="vitesse" id="vitesse" placeholder="Vitesse"></input>
        <input name="pdv_max" id="pdv_max" placeholder="pdvmax"></input>
        <input name="pv" id="dedevie" placeholder="Dé de vie"></input>

        
        </div>


        <div id="arme">
        <textarea name="armes" rows="4" cols="80" type="input" placeholder="Armes bonus d'attaque , dès de dégatset type de dégats">Armes bonus d'attaque , dès de dégatset type de dégats </textarea>
        </div>

        <div id="capacite">
            <textarea name="equipement_capacite" id="equipement_capacite" rows="5" cols="80">Equipement et capacité</textarea>

        </div>

 
    </div>
    <div id="backstory" class="justify-content-center">
    <h5>Histoire du personnage</h5>
    <textarea rows="5" cols="165" name="biographie" placeholder="">Raconte la vie de ton personnage </textarea>
  </div>
    <button type="sumbit" class="btn btn btn-primary mb-3  justify-content-end">Suivant</button>
  </div>

  
  
  </form>
</div>
</main>

</body>