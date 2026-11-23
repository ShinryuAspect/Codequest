<?php
require_once '../config/config.php';
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

$checkUser = $pdo->prepare("SELECT id FROM users WHERE id = ?");
$checkUser->execute([$_SESSION['user_id']]);
if (!$checkUser->fetch()) {
    session_destroy();
    header("Location: index.php?error=deleted");
    exit();
}

$username = $_SESSION['username'] ?? 'Guerrero';
$xp       = $_SESSION['xp'] ?? 0;
$avatar   = $_SESSION['avatar'] ?? 'Warrior';

$niveles = [
    ['id' => 1, 'name' => 'Minas de SQL', 'min_xp' => 0, 'file' => 'dungeon.php', 'icon' => '⛏️'],
    ['id' => 2, 'name' => 'Bosque del Debugger', 'min_xp' => 0, 'file' => 'forest.php', 'icon' => '🌳'],
    ['id' => 3, 'name' => 'Altar de JS', 'min_xp' => 0, 'file' => 'js_challenge.php', 'icon' => '⚡'],
    ['id' => 4, 'name' => 'Torre de Desafíos', 'min_xp' => 100, 'file' => 'tower.php', 'icon' => '🗼'],
    ['id' => 5, 'name' => 'Cripta del Servidor', 'min_xp' => 250, 'file' => '#', 'icon' => '💀']
];

include 'views/map_view.php';
?>