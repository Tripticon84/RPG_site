<?php

session_start();

require_once '../script.php';
require_once 'chat_script.php';

header('Content-Type: application/json');

if (isset($_SESSION['id_partie']) && !empty($_SESSION['id_partie']))
{
    $chatID = $_SESSION['id_partie'];
    $pseudo = $_SESSION['pseudo'];
    $chat = getChat($pseudo, $chatID);
    echo json_encode($chat);
}
else
{
    echo json_encode('Pas de chatID fourni');
}