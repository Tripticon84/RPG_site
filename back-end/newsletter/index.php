<?php $title = 'Newsletter';
include('../includes/head.php');
require 'newsletter_script.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; 

$bdd = PDOConnect();

?>


<body>
    <?php include('../includes/header.php'); ?>
    <div class="container-fluid">
        <div class="row">
            <?php include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col-12 bg-body-secondary col-xl-5">


                        <!-- Liste des newsletters -->
                        <table class="table">
                            <tr>
                                <th>Date</th>
                                <th>Campagne 1</th>
                                <th>Campagne 2</th>
                                <th>Campagne 3</th>
                                <th>Nb d'email</th>
                            </tr>

                            <?php
                            foreach (listAllNewsletter($bdd) as $newsletter) {
                                echo '<tr>';
                                echo '<td>' . date('d/m/Y', strtotime($newsletter['date'])) . '</td>';
                                echo '<td>' . $newsletter['campagne1'] . '</td>';
                                echo '<td>' . $newsletter['campagne2'] . '</td>';
                                echo '<td>' . $newsletter['campagne3'] . '</td>';
                                echo '<td>' . $newsletter['nb_emails'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    </div>
                    <div class="col-12 col-xl-6 offset-1">
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
                            foreach (newsletterList($bdd) as $newsletter) {
                                echo '<tr>';
                                echo '<td>' . $newsletter['email'] . '</td>';
                                echo '<td><a href="newsletter_script.php?id=' . $newsletter['id_newsletter_list'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
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