<?php
function generateRandomLoot($pdo, $userId) {
    $roll = rand(1, 100);
    
    if ($roll <= 5) $rarity = 'epic';
    elseif ($roll <= 30) $rarity = 'rare';
    else $rarity = 'common';

    $stmt = $pdo->prepare("SELECT id, name FROM items WHERE rarity = ? ORDER BY RAND() LIMIT 1");
    $stmt->execute([$rarity]);
    $item = $stmt->fetch();

    if ($item) {
        $insert = $pdo->prepare("INSERT INTO user_items (user_id, item_id) VALUES (?, ?)");
        $insert->execute([$userId, $item['id']]);
        
        require_once 'achievement_system.php';
        checkAndGrantAchievements($pdo, $userId);

        return $item; 
    }
    return null;
}