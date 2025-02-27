<?php

if (!session_id()) session_start();
$isLogedIn = isset($_SESSION['user_id']);
if (!$isLogedIn) {
    if (isset($redirect)) {
        header("Location: $redirect");
    }
    die();
}
