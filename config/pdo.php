<?php
// database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'library');
define('DB_USER', 'root');
define('DB_PASS', '');
 
// create a new PDO database connection
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . "; dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // handle error
    echo 'Connection Error: ' . $e->getMessage();
    exit;
}