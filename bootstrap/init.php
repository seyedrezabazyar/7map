<?php

include 'constants.php';
include BASE_PATH . 'bootstrap/config.php';
include BASE_PATH . 'libs/helpers.php';
include BASE_PATH . 'libs/lib-locations.php';

try {
    $pdo = new PDO("mysql:dbname={$databaseConfig->db};host={$databaseConfig->host}", $databaseConfig->user, $databaseConfig->password);
    $pdo->exec('SET NAMES utf8');
} catch (PDOException $e) {
    diepage('Connection failed: ' . $e->getMessage());
}

// echo "Connection is OK";