<?php $title = 'Captcha';
include('../includes/head.php');
require_once 'captcha_script.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; ?>

<body>
    <? include_once('../includes/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <? include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col-5 bg-body-tertiary">
                        <?php
                        if (isset($_GET['message']) && !empty($_GET['message'])) {
                            alertWarning('Erreur', $_GET['message']);
                        }

                        if (isset($_GET['success']) && !empty($_GET['success'])) {
                            alertSuccess('Succès', $_GET['success']);
                        }
                        ?>

                        <h2 class="my-3">Création d'un captcha</h2>

                        <form action="captcha_script.php">
                            <input type="text" name="question" class="form-control my-3" placeholder="Ajouter une question">
                            <input type="text" name="reponse" class="form-control my-3" placeholder="Ajouter une reponse">
                            <input type="hidden" name="action" value="add">
                            <input type="submit" value="Ajouter le captcha" class="btn btn-primary my-3">

                        </form>
                    </div>
                    <div class="col-6 offset-1">

                        <!-- Liste des captcha -->
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Réponse</th>
                            </tr>

                            <?php
                            foreach (captchaList() as $captcha) {
                                echo '<tr>';
                                echo '<td>' . $captcha['id_captcha'] . '</td>';
                                echo '<td>' . $captcha['question'] . '</td>';
                                echo '<td>' . $captcha['reponse'] . '</td>';
                                echo '<td><a href="captcha_script.php?id=' . $captcha['id_captcha'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
                                echo '</tr>';
                            }
                            ?>
                            </table>
                    </div>
                </div>
        </div>
</body>