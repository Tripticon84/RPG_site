<?php /*
// Connexion à la base de données ???
$login = new mysqli('localhost', 'utilisateur', 'motdepasse', 'basededonnees');

// Vérifier la connexion
if ($login->connect_error) {
    die("La connexion à la base de données a échoué : " . $login->connect_error);
}

// Écrire une requête SQL pour récupérer les données
$sql = "SELECT champ1, champ2, champ3, champ4, champ5 FROM ma_table WHERE condition = 'la condition'";

// Exécuter la requête SQL
$result = $login->query($sql);

// Vérifier s'il y a des résultats
if ($result->num_rows > 0) {
    // Boucler à travers les résultats et remplir les champs de formulaire
    while ($row = $result->fetch_assoc()) {
        $champ1_value = $row['champ1'];
        $champ2_value = $row['champ2'];
        $champ3_value = $row['champ3'];
        $champ4_value = $row['champ4'];
        $champ5_value = $row['champ5'];
    }
} else {
    echo "Aucun résultat trouvé";
}

// Fermer la connexion à la base de données
$conn->close();


// Envoie d'une requête d'enregistrement 

if(isset($_POST['enregistrer'])) {
    $champ1 = $_POST['champ1'];
    // Récupérez les autres champs de la même manière
    
    // Enregistrez les données dans la base de données 
}
*/?>



<!DOCTYPE html>
<html lang="Fr">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    
</head>

<?php $title = 'Profil';
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
    
        <!-- Bouton vers le profil privé  -->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right mt-3">
      <a href="profil.php" class="btn btn-outline-danger">Page Publique</a>
    </div>
  </div>
</div>



    <div class="container">
  <div class="row justify-content-center">
    <!-- Section Info perso -->
    <div class="col-md-8">
      <div class="bg-light rounded p-4 mb-4" style="background-color: #FFCCCB;">
        <!-- Contenu de la grande section -->
        <h2 class="text-center">Informations personnelles</h2>
        
        <!-- 5 champs à gauche -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ1">Nom :</label>
              <input type="text" class="form-control" id="champ1">
            </div>
            <div class="form-group">
              <label for="champ2">Prénom :</label>
              <input type="text" class="form-control" id="champ2">
            </div>
            <div class="form-group">
              <label for="champ3"> Pseudo :</label>
              <input type="text" class="form-control" id="champ3">
            </div>
            <div class="form-group">
              <label for="champ4">Adresse e-mail :</label>
              <input type="text" class="form-control" id="champ4">
            </div>
            <div class="form-group">
              <label for="champ5">Téléphone :</label>
              <input type="text" class="form-control" id="champ5">
            </div>
          </div>
          
          <!-- Trois champs à droite -->
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ6">Ancien mot de passe:</label>
              <input type="text" class="form-control" id="champ6">
            </div>
            <div class="form-group">
              <label for="champ7">Nouveau mot de passe :</label>
              <input type="text" class="form-control" id="champ7">
            </div>
            <div class="form-group">
              <label for="champ8">Confirmer le nouveau mot de passe :</label>
              <input type="text" class="form-control" id="champ8">
              <!-- Bouton en dessous des trois champs à droite -->
              <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>



<!-- Deuxième section  -->


<!-- Troisième section -->

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="bg-light rounded p-4 mb-4">
        <h2 class="text-center">Préférences</h2>
        
        <!-- Champs à gauche -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ1">Langues :</label>
              <select class="form-control" id="champ1">
                <option value="">Français</option>
                <option value="">Anglais</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ2">Thème</label>
              <select class="form-control" id="champ2">
                <option value="">Clair</option>
                <option value="">Foncé</option>
                <option value="">Daltonien</option>
              </select>
            </div>
          </div>
        </div>
        
        <!-- Champs à droite -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ3">Notifications</label>
              <select class="form-control" id="champ3">
                <option value="">Par e-mail</option>
                <option value="">Par téléphone</option>
                <option value="">Pas de notifications</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="champ4">Taille des textes :</label>
              <select class="form-control" id="champ4">
                <option value="">Moyenne</option>
                <option value="">Grande</option>
                <option value="">Très grande</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Bouton en bas à droite -->
        <div class="text-right">
          <button type="button" class="btn btn-primary">Valider</button>
        </div>
        
      </div>
    </div>
  </div>
</div>




    <?php //include('./includes/footer.php');?>
</body>

</html>