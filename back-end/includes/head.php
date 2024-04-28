<?php
session_start();
if (!isset($_SESSION['user']) && $title !== 'Connexion')
    header('location: /back-end/login');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/back-end/favicon.ico" type="image/x-icon">
    <title><?= 'RoF - Tableau de bord' . ' - ' . htmlspecialchars($title); ?></title>
    <!-- Bootstrap CSS v5.3.3 -->
    <link
            rel="stylesheet"
            href="/css/style.css"
        />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/back-end/css/style.css">
    <link rel="stylesheet" href="/back-end/css/dashboard.css">

    <!-- Bootstrap icons -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    />
    <!-- Bootstrap JavaScript Libraries -->
    <script
        src="/js/bootstrap.bundle.min.js"
    ></script>
    <script src="/back-end/js/script.js"></script>
</head>
