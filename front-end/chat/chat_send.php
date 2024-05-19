<?php

require_once 'chat_script.php';

session_start();

if (!isset($_POST['chatID']) 
    || empty($_POST['chatID']) 
    || !isset($_POST['message']) 
    || empty($_POST['message'])) {
        http_response_code(400);
} else {
    
    addChat($_POST['chatID'],$_SESSION['pseudo'], $_POST['message']);
    http_response_code(200);

}