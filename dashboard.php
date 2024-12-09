<?php

// $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/dashboard-style.css">
</head>
<body>
    <div class="half-circle"></div>
    <div class="headerwrapper">
        <div class="header">
            <nav class="dash-nav">
                <a class="button-menu-href" href=""><img class="button-menu" src="src/svg/menu.svg" alt=""></a>
                <a class="button-profile-href" href="login.html">logout<img class="button-profile" src="src/svg/profile-icon.svg" alt=""></a>
            </nav>
        </div>
        <div class="section">
            <div class="wrapper">
                <div class="profile-container">
                    <span class="profile-container-span">
                        <img class="profile-picture" src="src/img/profile-sample.jpeg" alt="">
                        <span class="profile-text-box">
                            <h1>Hi! user</h1>
                            <p>What's on your mind</p>
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="contentwrapper"> -->
        <div class="message-alert-container">
            <div class="message-alert">
                <p>Hola. Using this ui for login page for testing purposes.</p>
                <p>Can't interact with other buttons. Only Fingerprint button works</p>
            </div>
        </div>
    
        <div class="choices">
            <a class="icons-size icons-disabled" href="#"><div class="center-this"><img src="src/svg/button-wifi.svg" alt=""></div><p>Wifi settings</p></a>
            <a class="icons-size icons-working" href="userlist.php"><div class="center-this"><img src="src/svg/button-fingerprint.svg" alt=""></div><p>Fingerprint</p></a>
            <a class="icons-size row2 icons-disabled" href="#"><div class="center-this"><img src="src/svg/button-log.svg" alt=""></div><p>Activity Logs</p></a>
            <a class="icons-size row2 icons-disabled" href="#"><div class="center-this"><img src="src/svg/button-security.svg" alt=""></div><p>Security Settings</p></a>
        </div>
    <!-- </div> -->
</body>
</html>