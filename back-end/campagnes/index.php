<?php $title = 'Campagnes';
include('../includes/head.php');
require_once('campagnes_script.php');
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; ?>

<body>
    <?php include_once('../includes/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col bg-body-secondary">

                        <h2 class="my-3">Afficher les campagnes</h2>
                        <?php
                        if (isset($_GET['message']) && !empty($_GET['message'])) {
                            alertWarning('Erreur', $_GET['message']);
                        }

                        if (isset($_GET['success']) && !empty($_GET['success'])) {
                            alertSuccess('Succès', $_GET['success']);
                        }
                        ?>

                        <div class="col-12 userList">

                            <!-- Liste des utilisateurs -->
                            <table class="table">
                                <tr>
                                    <th>ID</th>
                                    <th>ID Plateau</th>
                                    <th>Nom</th>
                                    <th>Logo</th>
                                    <th>Description</th>
                                    <th>Brouillon</th>
                                    <th>Créateur</th>
                                    <th>Actions</th>
                                </tr>

                                <?php
                                foreach (campagneList() as $campagnes) {
                                    echo '<tr>';
                                    echo '<td>' . $campagnes['id_camp'] . '</td>';
                                    echo '<td>' . $campagnes['id_plateau'] . '</td>';
                                    echo '<td>' . $campagnes['nom'] . '</td>';
                                    echo '<td>' . '<img src="/image/campagnes/' . $campagnes['logo'] . '" width="200px">' . '</td>';
                                    echo '<td>' . $campagnes['description'] . '</td>';
                                    if ($campagnes['brouillon'] == 0)
                                        echo '<td>Public</td>';
                                    else
                                        echo '<td>Brouillon</td>';
                                    echo '<td>' . $campagnes['createur'] . '</td>';
                                    echo '<td><a href="campagne_script.php?id=' . $campagnes['id_camp'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
                                    echo '</tr>';
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>