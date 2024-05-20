<?php

function getChat($pseudo, $chatID)
{

    $result[] = $pseudo;

    // Vérifier si le dossier chat existe, sinon le créer
    $chatDir = $_SERVER['DOCUMENT_ROOT'] . '/chats';
    if (!is_dir($chatDir))
        mkdir($chatDir);

    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/chats/' . $chatID . '.txt';
    $fileContents = file_get_contents($filePath);
    $lines = explode("\n", $fileContents);
    
    foreach($lines as $line)
        $result[] = explode("\u{0006}", $line);

    return $result;
}

function addChat($ChatID, $owner, $message)
{
    // Vérifier si le dossier chat existe, sinon le créer
    $chatDir = $_SERVER['DOCUMENT_ROOT'] . '/chats';
    if (!is_dir($chatDir))
        mkdir($chatDir);

    $chatFile = fopen($_SERVER['DOCUMENT_ROOT'] . '/chats/' . $ChatID . '.txt', 'a+');
    
    // $filePath = $_SERVER['DOCUMENT_ROOT'] . '/chats/' . $ChatID . '.txt';
    $lines = "\n" . date('H:i') . "\u{0006}" . $owner . "\u{0006}" . $message;

    fputs($chatFile, $lines);

    fclose($chatFile);
}
/*

// Ajout de la ligne au fichier ouvert 
fputs($log, $line);

// Fermeture du fichier ouvert
fclose($log);
*/