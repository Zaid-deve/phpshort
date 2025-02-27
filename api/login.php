<?php
header("Content-Type: application/json");
require "db.php"; // Include DB connection

// Read JSON input from frontend
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data['email']) || !isset($data['password'])) {
    echo json_encode(["success" => false, "message" => "Invalid request."]);
    exit;
}

$email = trim($data['email']);
$password = trim($data['password']);

// Check if the user exists
$stmt = $conn->prepare("SELECT uid, uname, upass FROM users WHERE uemail = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    // Verify password (assuming passwords are hashed using password_hash)
    if (password_verify($password, $user['upass'])) {
        session_start();
        $_SESSION['user_id'] = $user['uid'];
        $_SESSION['user_name'] = $user['uname'];

        echo json_encode(["success" => true, "message" => "Login successful.", "user" => ["id" => $user['uid'], "name" => $user["uname"]]]);
    } else {
        echo json_encode(["success" => false, "message" => "Invalid password."]);
    }
} else {
    echo json_encode(["success" => false, "message" => "User not found."]);
}

$stmt->close();
$conn->close();
?>
