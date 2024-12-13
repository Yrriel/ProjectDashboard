<?php

$host = $_ENV['PGHOST'];
$port = $_ENV['PGPORT'];
$dbname = $_ENV['PGDATABASE'];
$user = $_ENV['PGUSER'];
$password = $_ENV['PGPASSWORD'];


    try {
        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";
        $pdo = new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(["success" => false, "message" => "Database connection failed.", "error" => $e->getMessage()]);
        exit;
    }
?>