<?php $title = 'Logs';
include('../includes/head.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; ?>

<body>
    <?php include_once('../includes/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col bg-body-secondary">

                        <h2 class="my-3">Afficher les logs</h2>

                        <?php
                        if (isset($_GET['message']) && !empty($_GET['message'])) {
                            alertWarning('Erreur', $_GET['message']);
                        }

                        if (isset($_GET['success']) && !empty($_GET['success'])) {
                            alertSuccess('Succès', $_GET['success']);
                        }
                        ?>

                        <select class="form-select" id="logAction" name="logAction" onchange="changeLogList()" >
                            <option value="pages">Visites de connexion</option>
                            <option value="sign-in">Connexion</option>
                            <option value="sign-up">Inscription</option>
                        </select>

                        <div id="result" class="mt-4 overflow-auto" style="height: 80vh;">

                        </div>
                        <script>
                            changeLogList();
                        </script>
                    </div>
                </div>
</body>