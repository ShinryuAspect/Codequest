<?php
require_once '../config/config.php';
require_once '../config/db.php';
require_once '../api/loot_system.php';

if (!isset($_SESSION['user_id'])) header("Location: index.php");

$userId = $_SESSION['user_id'];
$xpEarned = 25;

$updateXp = $pdo->prepare("UPDATE users SET xp = xp + ? WHERE id = ?");
$updateXp->execute([$xpEarned, $userId]);

$_SESSION['xp'] += $xpEarned;

$item = generateRandomLoot($pdo, $userId);

include 'views/victory_view.php';
?>