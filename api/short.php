<?php
header("Content-Type: application/json");
require "db.php"; // Database connection

// Function to generate a unique short code
function generateShortCode($length = 6) {
    $characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($characters), 0, $length);
}

// Read JSON input
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data["url"]) || empty(trim($data["url"]))) {
    echo json_encode(["success" => false, "message" => "URL is required."]);
    exit;
}

session_start();
$originalUrl = trim($data["url"]);
$userId = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : null;

// Validate URL format
if (!filter_var($originalUrl, FILTER_VALIDATE_URL)) {
    echo json_encode(["success" => false, "message" => "Invalid URL format."]);
    exit;
}

// Generate a unique short code
$shortCode = generateShortCode();
while (true) {
    $stmt = $conn->prepare("SELECT id FROM short_urls WHERE short_code = ?");
    $stmt->bind_param("s", $shortCode);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) break; // Unique code found

    $shortCode = generateShortCode(); // Regenerate if not unique
}

$stmt->close();

// Insert into database (always creates a new short link)
$stmt = $conn->prepare("INSERT INTO short_urls (original_url, short_code, user_id) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $originalUrl, $shortCode, $userId);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "surl" => "http://localhost/phpshort/$shortCode"]);
} else {
    echo json_encode(["success" => false, "message" => "Failed to shorten URL."]);
}

$stmt->close();
$conn->close();
?>
