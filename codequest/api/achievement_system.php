<?php
function checkAndGrantAchievements($pdo, $userId) {
    $sql = "SELECT * FROM achievements WHERE id NOT IN (
                SELECT achievement_id FROM user_achievements WHERE user_id = ?
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);
    $pendingAchievements = $stmt->fetchAll();

    foreach ($pendingAchievements as $ach) {
        $unlocked = false;

        switch ($ach['requirement_type']) {
            case 'items_count':
                $count = $pdo->prepare("SELECT COUNT(*) FROM user_items WHERE user_id = ?");
                $count->execute([$userId]);
                if ($count->fetchColumn() >= $ach['requirement_value']) $unlocked = true;
                break;

            case 'rarity_find':
                $rare = $pdo->prepare("SELECT COUNT(*) FROM user_items ui 
                                      JOIN items i ON ui.item_id = i.id 
                                      WHERE ui.user_id = ? AND i.rarity = 'epic'");
                $rare->execute([$userId]);
                if ($rare->fetchColumn() >= 1) $unlocked = true;
                break;
        }

        if ($unlocked) {
            $grant = $pdo->prepare("INSERT INTO user_achievements (user_id, achievement_id) VALUES (?, ?)");
            $grant->execute([$userId, $ach['id']]);

            addNotification("¡LOGRO DESBLOQUEADO: {$ach['name']}! {$ach['icon']}", 'achievement');
            
            $anyUnlocked = true;
        }
    }

    return $anyUnlocked;
}