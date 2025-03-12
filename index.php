<?php
$file = 'log.txt';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $password = $_POST["password"];
    $success = $_POST["success"];
    $timestamp = date("Y-m-d H:i:s");
    
    $log_entry = "$timestamp - Tentative: $password - Status: $success\n";
    file_put_contents($file, $log_entry, FILE_APPEND);
    exit;
}

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

<!DOCTYPE html>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Hello</title>
    <link rel="stylesheet" href="./assets/vendor/css/rtl/core.css" />
    <link rel="stylesheet" href="./assets/vendor/css/rtl/theme-default.css" />
    <link rel="stylesheet" href="./assets/css/demo.css" />
    <link rel="stylesheet" href="./assets/vendor/css/pages/page-auth.css">
</head>
<body>
    <div class="authentication-wrapper authentication-basic container-p-y p-4 p-sm-0">
        <div class="authentication-inner py-6">
            <div class="card p-md-7 p-1">
                <div class="app-brand justify-content-center mt-5">
                    <a href="index.html" class="app-brand-link gap-2">
                        <span class="app-brand-logo demo">
                            <img src="./assets/img/icons/misc/icons8-guitar-96.png" height="48px" alt="">
                        </span>
                        <span class="app-brand-text demo text-heading fw-semibold">Hello</span>
                    </a>
                </div>
                <div class="card-body mt-1">
            <!--h5 class="mb-1">Enter the name of the song to continue 🔒</h5-->
			<h5 class="mb-1">Morning (M) ,</h5>
            <p class="mb-5"> <br/>
              I think that u are the right person. <br/>
              To make sure , enter the name of the song sent to u few weeks ago , then meet me there today at 16:30pm.</p>
            <div id="formAuthentication" class="mb-5">
              <div class="form-floating form-floating-outline mb-5">
                <input type="text" class="form-control" type="password" id="password" placeholder="Enter the name of the song"
                  autofocus>
                <label>name of the song</label>
              </div>
              <button class="btn btn-primary d-grid w-100" onclick="checkPassword()">Continue</button>
            </div>
          </div>
            </div>
        </div>
    </div>
    <script>
        function logAttempt(password, success) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("password=" + encodeURIComponent(password) + "&success=" + success);
        }
        
        function checkPassword() {
            var password = document.getElementById("password").value.toLowerCase();
            if (password === "wish you were here") {
                logAttempt(password, "success");
                window.location.href = "https://www.google.com/maps?q=34.7250843,10.7832588&hl=en-TN&gl=tn&entry=gps&lucs=,94255446,94242487,47071704,47069508&g_ep=CAISDDYuODUuNS4xNDU5MBgAINeCAyokLDk0MjU1NDQ2LDk0MjQyNDg3LDQ3MDcxNzA0LDQ3MDY5NTA4QgJUTg%3D%3D&skid=8d917124-28ea-49c3-8ef2-4ea0026c3ca8&g_st=ic";
            } else {
                logAttempt(password, "failed");
                alert("Incorrect !");
            }
        }
    </script>
</body>
</html>
