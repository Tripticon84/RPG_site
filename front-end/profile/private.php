<?php /*
// Connexion à la base de données
$login = new mysqli('localhost', 'utilisateur', 'motdepasse', 'basededonnees');

// Vérifier la connexion
if ($login->connect_error) {
    die("La connexion à la base de données a échoué : " . $login->connect_error);
}

// Écrire une requête SQL pour récupérer les données
$sql = "SELECT champ1, champ2, champ3, champ4, champ5 FROM ma_table WHERE condition = 'votre_condition'";

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


// Envoie d'une reqûete d'enregistrement 

if(isset($_POST['enregistrer'])) {
    $champ1 = $_POST['champ1'];
    // Récupérez les autres champs de la même manière
    
    // Enregistrez les données dans la base de données 
}
*/?>





<?php $title = 'Profil privé';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');  

$log = logPage($title);  // déclenche la fonction logPage ?>

<?php 

$db = PDOConnect();

$req = $db->prepare('SELECT pseudo, email, nom , prenom FROM UTILISATEUR WHERE id_uti = :id'); //requete récuparéant les infos users incompléte , pour la compléter : 

//$stmt = $db->prepare("SELECT pseudo FROM users WHERE email = :email"); :email sert a utiliser le current email dans la session
// $stmt->bindParam(':email', $email); // Liaison du paramètre nommé à la valeur de l'email de session   

$req->execute([
  'id' =>  $_SESSION['id_uti']
]); //exécution de la requête


$userData = $req->fetch(PDO::FETCH_ASSOC);//récupération dans un tableau  
$nom = $userData['nom'];
$prenom = $userData['prenom'];

$pseudo = $_SESSION['pseudo'];
$email = $_SESSION['email'];


?>


<body>
<script  src="js/profil.js"></script>

    <main class="mt-5">
       
    <!-- Bouton vers l'acceuil   -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <a href="index.php" class="btn btn-outline-danger mt-3 ml-3">Accueil</a>
                </div>
            </div>
        </div>
    
        <!-- Bouton vers le profil publique  -->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-right mt-3">
      <a href="profil.php" class="btn btn-outline-danger">Page Publique</a>
    </div>
  </div>
</div>



<form method="post" action="verif_private.php">
  <div class="container">
    <div class="row justify-content-center">
      <!-- Section Info perso -->
      <div class="col-md-8">
        <div class=" bg-body-secondary rounded p-4 mb-4">
          <!-- Contenu de la grande section -->
          <h2 class="text-center">Informations personnelles</h2>

          <!-- 5 champs à gauche -->
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nom">Nom : <?php echo ($nom); ?> </label> <!-- Affiche le nom -->
                <input type="text" class="form-control" id="nom" name="nom">
              </div>
              <div class="form-group">
                <label for="prénom">Prénom :<?php echo ($prenom); ?>  </label>
                <input type="text" class="form-control" id="prenom" name="prenom">
              </div>
              <div class="form-group">
                <label for="pseudo"> <b> Pseudo</b> : <?php echo ($pseudo); ?> </label> <!-- Affiche le pseudo -->
                <input type="text" class="form-control" id="pseudo" name="pseudo">
              </div>
              <div class="form-group">
                <label for="email"><b>Adresse e-mail :</b> <?php echo ($email); ?> </label> <!-- Affiche l'email -->
                <input type="text" class="form-control" id="email" name="email">
              </div>
              <div class="form-group">
                <label for="tel">Téléphone :</label>
                <input type="text" class="form-control" id="tel" name="tel">
              </div>
            </div>

            <!-- Trois champs à droite -->
            <div class="col-md-6">
              <div class="form-group">
                <label for="mdp">Ancien mot de passe:</label>
                <input type="password" class="form-control" id="mdp" name="ancientpassword">
              </div>
              <div class="form-group">
                <label for="newmdp">Nouveau mot de passe :</label>
                <input type="password" class="form-control" id="newmdp" name="newpassword">
              </div>
              <div class="form-group">
                <label for="newmdp_confirm">Confirmer le nouveau mot de passe :</label>
                <input type="password" class="form-control" id="newmdp_confirm" name="verifypassword">
                <!-- Bouton en dessous des trois champs à droite -->
                <button type="submit" id="enregistrer"  class="btn btn-primary mt-2">Enregistrer</button>
              </div>
              <a type="submit" href="genpdf.php?user=<?=$_SESSION['id_uti']?>" id="enregistrer"  class="btn btn-primary mt-2">Export des infos utilisateurs</a>
              <a type="submit" href="delete.php" id="enregistrer"  class="btn btn-primary mt-2">Supprimer mon compte</a>

            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</form>



<!-- Deuxième section  -->


<!-- Troisième section -->
<?php /* partie du formulaire qu'on hésite a retirer -> retirer les balises ici et en bas pour voir cette partie
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

*/
?>

<?php include('../includes/footer.php');?>
</body>

</html> 

