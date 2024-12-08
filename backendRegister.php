<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
require 'config.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once 'connection.php';
    //retrieve form data

    $email = strtolower($_POST['uname']);
    $firstName = ucfirst(strtolower($_POST['fname']));
    $lastName = ucfirst(strtolower($_POST['lname']));
    $password = $_POST['upass'];
    $cpassword = $_POST['cupass'];


    //token generator
    $access_token = md5(uniqid().rand(1000000, 9999999));

    // validate login authentication
    $queryEmail = "SELECT * FROM login WHERE email='$email'";
    $resultEmail = $conn->query($queryEmail);

    $mysqlitime = date('Y-m-d H:i:s');

    // compare if user already has an account
    // echo"<h1>Debuging : echo : {$result->num_rows}</h1>";
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // valid address
        echo '<script>
                    alert("Your email : '.$email.' is not valid. please provide a valid email");
                    window.location.href="../index.php";
                </script>';
        exit();
    }

    //check if account is taken
    if($resultEmail->num_rows == 1){
        echo '<script>
                    alert("email is already taken. select another email");
                    window.location.href="../index.php";
                </script>';
        exit();
    }

    //check password length
    if(strlen($password) < 6){
        echo '<script>
                    alert("Password is too short. provide atleast 6 letters");
                    window.location.href="../index.php";
                </script>';
        exit();
    }

    //Register success
    else{
        //register success
        
        $conn->query("INSERT INTO `tablelistowner`(`UID`, `email`, `password`, `firstName`, `lastName`) VALUES ('NOT VERIFIED','$email','$password','$firstName','$lastName')");
        echo '<script>
                    alert("Account registered! Please check your email.");
                    window.location.href="../index.php";
                </script>';
        exit();

        // $mail = new PHPMailer();

        // $mail->isSMTP();
        // $mail->SMTPAuth = true;

        // $mail->Host = MAILHOST;
        // $mail->Username = USERNAME;
        // $mail->Password = PASSWORD; 

        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587;
        // $mail->setFrom(SEND_FROM, SEND_FROM_NAME);

        // $mail->isHTML(true);                                  //Set email format to HTML
        // $mail->addAddress($email);     //Add a recipient
        
        // $mail->Subject = "Hey! Verify your email";
        // $mail->Body = "Please click on the link below to verify your account: <br><br>
        //                     <a href='http://localhost/SimpleCRUD/backend/backend.Register_confirm.php?email=$email&token=$access_token'>Register now</a>";

        // if($mail->send()){
        //     mysqli_query($conn, $adduser);
        //     mysqli_query($conn, $querylogin_checkusername);
        //     echo '<script>
        //             alert("Account registered! Please check your email.");
        //             window.location.href="../index.php";
        //         </script>';
        // exit();
        // }
        // else{
        //     echo '<script>
        //             alert("Oops! Something went wrong. Please try again.");
        //             window.location.href="../index.php";
        //         </script>';
        // exit();
        // }

        
    }

    $conn->close();

}

?>