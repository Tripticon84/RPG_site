<?php $title = 'Campagnes';
include('../includes/head.php');
require_once('parties_script.php');
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
                                    <th>Host</th>
                                    <th>Campagne</th>
                                    <th>Logo</th>
                                    <th>Confidentialité</th>
                                    <th>Code</th>
                                    <th>Limite de joueur</th>
                                    <th>Actions</th>
                                </tr>

                                <?php
                                foreach (partiesList() as $partie) {
                                    echo '<tr>';
                                    echo '<td>' . $partie['id_partie'] . '</td>';
                                    echo '<td>' . $partie['pseudo'] . '</td>';
                                    echo '<td>' . $partie['nom'] . '</td>';
                                    echo '<td>' . '<img src="/image/campagnes/' . $partie['logo'] . '.png" width="200px">' . '</td>';
                                    if ($partie['prive'] == 0)
                                        echo '<td>Public</td>';
                                    else
                                        echo '<td>Privée</td>';
                                    echo '<td>' . $partie['code'] . '</td>';
                                    echo '<td>' . $partie['limite_joueur'] . '</td>';
                                    echo '<td><a href="parties_script.php?id=' . $partie['id_partie'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
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