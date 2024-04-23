<head>
    <link rel="stylesheet" href="../css/login.css">
    <?php $title = 'Connexion';
    include('../includes/head.php'); ?>

<body>
    <?php include('../includes/header.php'); ?>
    <main>
        <div class="container d-flex justify-content-center align-items-center vh-100">
            <form class="d-flex flex-column my-4 mx-auto bg-body-secondary bg-opacity-75 p-3 rounded-4 login-window " action="verif_login.php" method="post">
                <h2 class=" text-center my-3">Connexion</h2>
                <?php if (isset($_GET['message']) && !empty($_GET['message'])) {
                    alertWarning('Erreur', $_GET['message']);
                }
                ?>
                <?php
                if (isset($_GET['success']) && !empty($_GET['success'])) {
                    alertSuccess('Succès', $_GET['success']);
                }
                ?>
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="nom@exemple.com">
                    <label for="floatingInput">Adresse mail</label>
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Mot de passe</label>
                </div>

                <button class="btn btn-primary align-self-end my-3" type="submit">Connexion</button>
            </form>

        </div>
    </main>

</body>

</html>