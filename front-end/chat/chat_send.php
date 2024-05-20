<?php

require_once 'chat_script.php';

session_start();

if (!isset($_SESSION['pseudo']) 
    || empty($_SESSION['pseudo'])
    || !isset($_POST['message']) 
    || empty($_POST['message'])
    || !is_string($_POST['message'])) {
        http_response_code(400);
} else {
    
    $chatID = htmlspecialchars($_SESSION['id_partie']);
    $message = str_replace(array("\r", "\n"), ' ', $_POST['message']);

    addChat($_SESSION['id_partie'],$_SESSION['pseudo'], $message);
    http_response_code(200);

}