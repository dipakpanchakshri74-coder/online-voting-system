<?php
/**
 * Database Configuration File
 * Online Voting System
 */

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'online_voting_system');

try {
    // Create connection using mysqli
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Set charset to utf8
    $conn->set_charset("utf8");
    
} catch (Exception $e) {
    die("Database connection error: " . $e->getMessage());
}

// Function to sanitize input
function sanitize_input($input) {
    return htmlspecialchars(stripslashes(trim($input)));
}

// Function to hash password
function hash_password($password) {
    return password_hash($password, PASSWORD_BCRYPT);
}

// Function to verify password
function verify_password($password, $hashed) {
    return password_verify($password, $hashed);
}
?>
