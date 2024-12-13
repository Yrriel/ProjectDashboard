<?php

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Initialize connection to the database
    require_once 'connection.php';

    // Retrieve form data
    $email = strtolower($_POST['uname']);
    $password = $_POST['upass'];

    // Validate login authentication using prepared statements
    $query = "SELECT * FROM tablelistowner WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    // Check if the user exists
    if ($stmt->rowCount() == 0) {
        echo '<script>
                alert("User doesn\'t exist. Please register a new account.");
                window.location.href="register.html";
              </script>';
        exit();
    }

    // Fetch the user data
    $resultArray = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user is verified
    if ($resultArray['UID'] == "NOT VERIFIED") {
        echo '<script>
                alert("This email is not verified yet. Please check your email.");
                window.location.href="login.html";
              </script>';
        exit();
    }

    // Verify the password using password_verify
    if (password_verify($password, $resultArray['password'])) {
        // Login success
        $_SESSION['email'] = $resultArray['email'];
        echo '<script>
                alert("Login successful. Welcome, ' . $_SESSION['email'] . '.");
                window.location.href="dashboard.php";
              </script>';
        exit();
    } else {
        // Login failed
        echo '<script>
                alert("Incorrect password. Please try again.");
                window.location.href="login.html";
              </script>';
        exit();
    }

    $pdo = null; // Close the connection
}
?>
