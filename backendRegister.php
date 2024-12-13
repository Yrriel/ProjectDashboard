<?php

if($_SERVER["REQUEST_METHOD"] == "POST"){

    require_once 'connection.php';
    // retrieve form data
    $email = strtolower($_POST['uname']);
    $password = $_POST['upass'];
    $cpassword = $_POST['cupass'];

    // Token generator
    $access_token = md5(uniqid().rand(1000000, 9999999));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email address
        echo '<script>
                alert("Your email : '.$email.' is not valid. Please provide a valid email.");
                window.location.href="register.html";
              </script>';
        exit();
    }

    // Check if email already exists in the database
    $queryEmail = "SELECT * FROM tablelistowner WHERE email = :email";
    $stmt = $pdo->prepare($queryEmail);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        echo '<script>
                alert("Email is already taken. Please select another email.");
                window.location.href="register.html";
              </script>';
        exit();
    }

    // Check if password and confirm password match
    if ($password != $cpassword) {
        echo '<script>
                alert("Password and Confirm password do not match. Please try again.");
                window.location.href="register.html";
              </script>';
        exit();
    }

    // Check password length
    if (strlen($password) < 6) {
        echo '<script>
                alert("Password is too short. Please provide at least 6 characters.");
                window.location.href="register.html";
              </script>';
        exit();
    }

    // Password hashing for security
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Register the user
    try {
        $insertQuery = "INSERT INTO tablelistowner (UID, email, password) VALUES ('NOT VERIFIED', :email, :password)";
        $stmt = $pdo->prepare($insertQuery);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
        
        $stmt->execute();

        // Success message and redirect to login page
        echo '<script>
                alert("Account registered! Please check your email.");
                window.location.href="login.html";
              </script>';
        exit();

    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Error during registration.", "error" => $e->getMessage()]);
        exit();
    }
}

?>
