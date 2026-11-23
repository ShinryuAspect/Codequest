<?php
$host = getenv('CQ_DB_HOST') ?: 'localhost';
$db   = getenv('CQ_DB_NAME') ?: 'codequest_main';
$user = getenv('CQ_DB_USER') ?: 'root';
$pass = getenv('CQ_DB_PASS') ?: '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    header('Content-Type: application/json');
    die(json_encode(['success' => false, 'message' => 'Error de conexión a DB']));
}