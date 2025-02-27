<?php


$db_host = 'localhost';
$db_name = "phpshort";
$db_user = "root";
$db_pass = "";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed."]));
}