<?php
// db.php
$host = "localhost";
$dbname = "padel_db"; // pastikan sama persis dengan nama di phpMyAdmin
$user = "root";
$pass = ""; // default XAMPP

$mysqli = new mysqli($host, $user, $pass, $dbname);

// cek error koneksi
if ($mysqli->connect_errno) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Koneksi database gagal: " . $mysqli->connect_error
    ]);
    exit;
}

$mysqli->set_charset("utf8");

// header untuk JSON + CORS
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    exit;
}
