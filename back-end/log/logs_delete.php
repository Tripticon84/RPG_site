<?php
session_start();

if (!isset($_SESSION['user']) && $title !== 'Connexion'){
    header('location: /back-end/login/index.php');
    exit;
}

$filePath = $_SERVER['DOCUMENT_ROOT'] . '/logs/' . $_GET['action'] . '.txt';
file_put_contents($filePath, '');
