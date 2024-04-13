<?php $title = 'Newsletter';
include('../includes/head.php');
require 'newsletter_script.php'; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; ?>

<body>
    <? include('../includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <? include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col-5 bg-danger">
                        <!-- Création d'une newsletter -->
                        
                    </div>
                    <div class="-++1">
                        <?php 
                            if (isset($_GET['message']) && !empty($_GET['message'])) {
                                alertWarning('Erreur', $_GET['message']);
                        }
                        ?>
                        <?php
                        if (isset($_GET['success']) && !empty($_GET['success'])) {
                            alertSuccess('Succès', $_GET['success']);
                        }
                        ?>
                        <!-- Liste des newsletters -->
                        <table class="table">

                            <tr>
                                <th>Email</th>
                                <th>Actions</th>
                            </tr>

                            <?php
                            foreach (newsletterList() as $newsletter) {
                                echo '<tr>';
                                echo '<td>' . $newsletter['email'] . '</td>';
                                echo '<td><a href="newsletter_script.php?id=' . $newsletter['id'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
                                echo '</tr>';
                            }
                            ?>
                            <table>
                                <tr>
                                    <form action="newsletter_script.php" method="get">
                                        <input type="email" name="email" class="form-control" placeholder="Ajouter un Email">
                                        <input type="hidden" name="action" value="add">
                                        <input type="submit" value="Ajouter l'email" class="btn btn-primary my-3">
                                    </form>
                                    </a>
                                </tr>
                            </table>
                    </div>
                </div>
        </div>
</body>