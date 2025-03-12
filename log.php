<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $success = $_POST["success"];
    $timestamp = date("Y-m-d H:i:s");
    
    $log_entry = "$timestamp - Tentative: $password - Status: $success\n";
    file_put_contents("log.txt", $log_entry, FILE_APPEND);
}
?>
