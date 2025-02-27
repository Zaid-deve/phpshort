<?php
session_start();
header("Content-Type: application/json");
require "db.php"; // Database connection

// Read JSON input from frontend
$data = json_decode(file_get_contents("php://input"), true);

// Validate required fields
if (!isset($data['name'], $data['email'], $data['password'])) {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit;
}

$name = trim($data['name']);
$uemail = trim($data['email']);
$password = trim($data['password']);

// Validate uemail format
if (!filter_var($uemail, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(["success" => false, "message" => "Invalid email format."]);
    exit;
}

// Check if user already exists
$stmt = $conn->prepare("SELECT uid FROM users WHERE uemail = ?");
$stmt->bind_param("s", $uemail);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    echo json_encode(["success" => false, "message" => "Email is already registered."]);
    exit;
}

$stmt->close();

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

// Insert new user
$stmt = $conn->prepare("INSERT INTO users (uname, uemail, upass) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $uemail, $hashedPassword);

if ($stmt->execute()) {
    $uid = $conn->insert_id;
    $_SESSION['user_id'] = $uid;
    echo json_encode(["success" => true, "message" => "Signup successful."]);
} else {
    echo json_encode(["success" => false, "message" => "Error creating account."]);
}

$stmt->close();
$conn->close();
?>
