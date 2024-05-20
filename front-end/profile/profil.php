<?php $title = 'Profil';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php');  

if (!isset($_SESSION['id_uti'])) {
    // Redirige vers l’accueil
    header("Location: index.php");
    exit; 
} 


$log = logPage($title);  // déclenche la fonction logPage 

$db = PDOConnect();

$req = $db->prepare('SELECT pseudo, email, nom , prenom,texte_je_suis, texte_recherche FROM UTILISATEUR WHERE id_uti = :id'); //requête récupérant les infos users incomplete , pour la compléter : 

$req->execute([
  'id' =>  $_SESSION['id_uti']
]); //exécution de la requête


$userData = $req->fetch(PDO::FETCH_ASSOC);//récupération dans un tableau  
$nom = $userData['nom'];
$prenom = $userData['prenom'];
$texte_je_suis =$userData['texte_je_suis'];
$texte_recherche =$userData['texte_recherche'];


$pseudo = $_SESSION['pseudo'];
$email = $_SESSION['email'];


// faire en sorte que la page renvoie aux informations de l'utilisateur ou le pseudo est dans l'url
// mais que seul l'utilisateur avec l'id associé au pseudo puisse modifier la page

?>


<!-- Bouton vers l’accueil   -->
    <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="index.php" class="btn btn-outline-danger mt-3 ml-3">Accueil</a>
                </div>
            </div>
        </div>
    
        <!-- Bouton vers le profil privé  -->
<div class="container">
  <div class="row">
    <div class="col-md-6 text-right mt-3">
      <a href="private.php" class="btn btn-outline-danger">Page Privé</a>
    </div>
  </div>
</div>


<body>


<form method="POST" action="verif_public.php">
<div class="container-fluid">

    <div class="row">
        <!-- Section campagne -->
        <div class="col-md-4">
            <div class="rounded border bg-body-secondary p-4 my-4"> 
                <h2>Fonctionnalités </h2>
                <ul>
                    <li>Mes récentes campagnes</li>
                    <li>Mes invitations</li>
                    <li>Liste de souhaits</li>
                </ul>
            </div>
        </div>
        
        <!-- Section 1 - Je suis -->
        <div class="col-md-8">
            <div class="rounded border bg-body-secondary p-4 my-4"> 
                <h2>Je suis</h2>
                <textarea class="form-control" id="texte_je_suis" name = "texte_je_suis" style="height: auto;" placeholder="<?php echo($texte_je_suis)?>"></textarea>
                <button type="submit" id="enregistrer" class="btn btn-primary d-block mx-auto">Enregistrer</button>
            </div> 
        </div>
    </div>
    
    <!-- Section 2 - Je recherche dans un groupe -->
    <div class="row">
        <!-- Section campagne -->
        <div class="col-md-4">
        
            <div class="border bg-body-secondary p-4 my-4">
                <h2>Récente campagne</h2>
                <ul>
                    <li>blabla</li>
                    <li>Mes invitations</li>
                    <li>Liste de souhaits</li>
                </ul>
            </div>
        </div>
        
        <!-- Section 2 - Je cherche dans un groupe -->
        <div class="col-md-8">
            <div class="border bg-body-secondary p-4 my-4">
                <h2>Je cherche dans un groupe</h2>
                <textarea class="form-control" id="texte_recherche" name = "texte_recherche" style="height: auto;" placeholder="<?php echo($texte_recherche)?>"></textarea>
                <button type="submit" id="enregistrer" class="btn btn-primary d-block mx-auto">Enregistrer</button>
            </div>
        </div>
    </div>
    
    <!-- Section Biographie -->
    <div class="row">
        <div class="col-md-12">
            <div class="border bg-body-secondary p-4 my-4">
                <h2 class="text-center">Biographie</h2>
                <textarea class="form-control" id="biography" name = "biography" style="height: auto;" placeholder="test"></textarea>
                <button type="submit" id="enregistrer" class="btn btn-primary d-block mx-auto">Enregistrer</button>
            </div>
        </div>
    </div>
</div>


</form>




<body>



<footer>
    <?php include('../includes/footer.php');?>
</footer>
</html>
