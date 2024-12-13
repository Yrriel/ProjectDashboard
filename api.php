<?php

// Database connection details using environment variables
$host = $_ENV['PGHOST'];
$port = $_ENV['PGPORT'];
$dbname = $_ENV['PGDATABASE'];
$user = $_ENV['PGUSER'];
$password = $_ENV['PGPASSWORD'];

// Connect to the PostgreSQL database
try {
    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Database connection failed.", "error" => $e->getMessage()]);
    exit;
}

// Handle incoming requests
$request = file_get_contents('php://input');
$data = json_decode($request, true);

if (!isset($data['action'])) {
    echo json_encode(["success" => false, "message" => "Action is required."]);
    exit;
}

switch ($data['action']) {
    case 'get_serial_number':
        // Query to fetch the serial number from the database
        $query = "SELECT esp32serialnumber FROM tablelistowner LIMIT 1"; // Adjust if necessary
        $stmt = $pdo->query($query);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $serialNumber = $row['esp32serialnumber'];
            echo json_encode(["success" => true, "serial_number" => $serialNumber]);
        } else {
            echo json_encode(["success" => false, "message" => "No serial number found."]);
        }
        break;

    default:
        echo json_encode(["success" => false, "message" => "Invalid action."]);
}

?>
