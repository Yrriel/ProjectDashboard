<?php

session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //initialize connections to database
    require_once 'connection.php';

    //retrieve form data
    $email = strtolower($_POST['uname']);
    $password = ($_POST['upass']);

    // validate login authentication
    $query = "SELECT * FROM `tablelistowner` WHERE `email`='$email'";
    $result = $conn->query($query);


    //is user exist?
    if($result->num_rows == 0){
        echo '<script>
                    alert("User doesn'."'".'t exist. Please register a new account.");
                    window.location.href="register.html";
                </script>';
        exit();
    }
    
    //is user verified?
    $verificationCheck = $result['UID'];
    if($verificationCheck == "NOT VERIFIED"){
        echo '<script>
                    alert("This email is not verified yet. Please check your email.");
                    window.location.href="login.html";
                </script>';
        exit();
    }

    if($resultusername->num_rows == 1 && $result->num_rows == 1){
        //login success

        $dataUser = $result['email'];
        $_SESSION['email'] = $dataUser;
        echo '<script>
                    alert("Debug Mode echo: attempt #'.$loginattempts.'. Time : '.$mysqlitime.'");
                    window.location.href="login.html";
                </script>';
        header("Location:dashboard.html");
        exit();
    }
    else{
        //login failed
                echo '<script>
                    alert("Debug Mode echo: attempt #'.$loginattempts.'. Time : '.$mysqlitime.'");
                    window.location.href="login.html";
                </script>';
            exit();
    }

    $conn->close();

}
?>