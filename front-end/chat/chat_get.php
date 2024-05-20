<?php

require_once '../script.php';
require_once 'chat_script.php';

header('Content-Type: application/json');

if (isset($_GET['chatID']) && !empty($_GET['chatID']))
{
    $chatID = $_GET['chatID'];
    $chat = getChat($chatID);
    echo json_encode($chat);
}
else
{
    echo json_encode('Pas de chatID fourni');
}