<?php
require "db.php";

// Get the short code from the URL
$shortCode = isset($_GET['code']) ? $_GET['code'] : '';

if (empty($shortCode)) {
    die("Invalid URL.");
}

// Retrieve the original URL
$stmt = $conn->prepare("SELECT original_url, clicks FROM short_urls WHERE short_code = ?");
$stmt->bind_param("s", $shortCode);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows === 0) {
    die("Short URL not found.");
}

$stmt->bind_result($originalUrl, $clicks);
$stmt->fetch();
$stmt->close();

// Update click count
$stmt = $conn->prepare("UPDATE short_urls SET clicks = clicks + 1 WHERE short_code = ?");
$stmt->bind_param("s", $shortCode);
$stmt->execute();
$stmt->close();

// Redirect to the original URL
header("Location: $originalUrl");
exit;
?>
