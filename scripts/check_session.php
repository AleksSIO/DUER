<?php
session_start();

$response = array();

if (isset($_SESSION['loggedin']) && isset($_SESSION['role'])) {
    $response['loggedin'] = true;
    $response['role'] = $_SESSION['role'];
} else {
    $response['loggedin'] = false;
}

header('Content-Type: application/json');
echo json_encode($response);
?>