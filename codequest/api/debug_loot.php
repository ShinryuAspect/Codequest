<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/loot_system.php';

if (!isset($_SESSION['user_id'])) {
    die("Error: No hay sesión de usuario activa.");
}

$newItem = generateRandomLoot($pdo, $_SESSION['user_id']);

if ($newItem) {
    addNotification("¡Has obtenido: " . $newItem['name'] . "!", 'success');
} else {
    addNotification("El cofre estaba vacío...", 'error');
}

header("Location: ../public/inventory.php");
exit();