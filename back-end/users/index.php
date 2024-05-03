<?php $title = 'Utilisateurs';
include('../includes/head.php');
require_once 'users_script.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/front-end/includes/message.php'; ?>

<body>
    <?php include_once('../includes/header.php'); ?>

    <div class="container-fluid">
        <div class="row">
            <?php include('../includes/sidebar.php'); ?>
            <main class="col-md-9 ms-sm-auto col-lg-10">
                <div class="row g-3 m-2">
                    <div class="col-12 bg-body-secondary col-xl-5">

                        <h2 class="my-3">Création d'un utilisateur</h2>

                        <?php if (isset($_GET['message']) && !empty($_GET['message'])) {
                            alertWarning('Erreur', $_GET['message']);
                        }

                        if (isset($_GET['success']) && !empty($_GET['success'])) {
                            alertSuccess('Succès', $_GET['success']);
                        }
                        ?>

                        <form action="users_script.php">
                            <input type="text" name="pseudo" class="form-control my-3" placeholder="Ajouter un pseudo">
                            <input type="email" name="email" class="form-control my-3" placeholder="Ajouter un email">
                            <input type="password" name="password" class="form-control my-3" placeholder="Ajouter un mot de passe">
                            <input type="text" name="nom" class="form-control my-3" placeholder="Ajouter un nom">
                            <input type="text" name="prenom" class="form-control my-3" placeholder="Ajouter un prénom">
                            <select name="status" class="form-select my-3">
                                <option value="user">Utilisateur</option>
                                <option value="admin">Administrateur</option>
                            </select>
                            <input type="hidden" name="action" value="add">
                            <input type="submit" value="Ajouter l’utilisateur" class="btn btn-primary my-3">

                        </form>
                    </div>
                    <div class="col-12 col-xl-6 userList">

                        <!-- Liste des utilisateurs -->
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            <?php
                            foreach (usersList() as $users) {
                                echo '<tr>';
                                echo '<td>' . $users['id_uti'] . '</td>';
                                echo '<td>' . $users['pseudo'] . '</td>';
                                echo '<td>' . $users['email'] . '</td>';
                                echo '<td>' . $users['nom'] . '</td>';
                                echo '<td>' . $users['prenom'] . '</td>';
                                if ($users['status'] == 2)
                                    echo '<td>Admin</td>';
                                else
                                    echo '<td>Utilisateur</td>';
                                echo '<td><a href="users_script.php?id=' . $users['id_uti'] . '&action=delete' . '" class="bi bi-trash"></a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </table>
                    </div>
                </div>
        </div>
</body>