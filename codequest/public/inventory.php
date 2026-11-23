<?php
require_once '../config/config.php';
require_once '../config/db.php';

$userId = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT i.* FROM items i JOIN user_items ui ON i.id = ui.item_id WHERE ui.user_id = ?");
$stmt->execute([$userId]);
$mis_objetos = $stmt->fetchAll();

$sqlAch = "SELECT a.*, (ua.unlocked_at IS NOT NULL) as is_unlocked 
           FROM achievements a 
           LEFT JOIN user_achievements ua ON a.id = ua.achievement_id AND ua.user_id = ?
           ORDER BY a.id ASC";
$stmtAch = $pdo->prepare($sqlAch);
$stmtAch->execute([$userId]);
$allAchievements = $stmtAch->fetchAll();

include 'views/inventory_view.php';