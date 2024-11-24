<?php

if(!isset($_GET['email'])){
    echo'
        <script>
        window.location.href="userlist.php";
        </script>
    ';
    exit();
}

require 'connection.php';

$email = $_GET['email'];
    echo'
    <script>
        alert("clicked on username : '.$_GET['email'].'");
        window.location.href="userlist.php";
    </script>';
    exit();
?>