<head>
    <link rel="stylesheet" href="../css/login.css">
<?php $title = 'Vérification du mail';

// Log de la page visitée
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/script.php';
logPage($title);

include_once('../includes/head.php'); 
include_once('../includes/message.php'); ?>

<?php
    // Connexion à la BDD
    require_once '../script.php';
    $bdd = PDOConnect();
    
    // Écrire la requête SELECT à trous
    $q = 'SELECT id,question FROM captcha ORDER BY RAND() LIMIT 1;';
    
    // Préparer la requête
    $req = $bdd->prepare($q);

    // Exécuter la requête 
    $req->execute([]);

// Récupérer les résultats dans un tableau $captcha
$captcha = $req->fetchAll();

?>


<body>
    <?php include('../includes/header.php'); ?>

    <main>
            <form 
                class="d-flex flex-column my-4 mx-auto bg-secondary bg-opacity-75 p-3 rounded-4 login-window"
                action="verif-sign-up-mail.php"
                method="post">
                <?php if(isset($_GET['message']) && !empty($_GET['message'])) {
                        alertWarning('Erreur', $_GET['message']);
                }                
                ?>

                <h2 class="my-4 text-center">Vérification du mail</h2>
                <?php 
                echo '<p>' . 'Un mail de vérification vient d\'être envoyé à <strong>' . $_SESSION['email'] . '</strong> vous avez 20 minutes avant que le code n\'expire' . '</p>' 
                ?>
                
                <div class="form-floating">
                    <input type="code" name="code" class="form-control" id="floatingVerifMail" placeholder="Entrer le code à 6 caractères" required maxlength="6">
                    <label for="floatingVerifMail">Entrer le code à 6 caractères</label>
                </div>
                <input type="hidden" name="email" value="<?= $_SESSION['email'] ?>">
                <p>Vous pourrez renvoyer un mail dans 60 secondes</p>
                <button class="btn btn-primary align-self-start my-3 disabled" type="button">Renvoyer le mail</button>
                <button class="btn btn-primary align-self-end my-3" type="submit">Confirmer</button>
            </form>

        </div>
    </div>
    </main>


<?php include('../includes/footer.php') ?>

</body>