<?php $title = 'Supprimer son compte';
include('../script.php');
include('../includes/head.php');
include('../includes/header.php');

$log = logPage($title);  // déclenche la fonction logPage 
?>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center my-5">
                <h2>Êtes-vous sûr de vouloir supprimer votre compte ?</h2>
            </div>
            <form action="POST" class="d-flex justify-content-center ">
                <a href="profil.php" class="btn btn-lg btn-success m-5 ">Non</a>
                <a href="verif_delete.php" class="btn btn-lg btn-danger m-5">Oui</a>
                <input type="hidden" name="id" value="<?= $_SESSION['id_uti'] ?>">
            </form>
        </div>
</main>




</body>

</html>