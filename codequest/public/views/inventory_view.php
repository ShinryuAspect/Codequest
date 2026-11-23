<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/inventory.css">
    <link rel="stylesheet" href="assets/css/notifications.css">
</head>
<body class="inventory-page">

    <header class="inventory-header">
        <div class="header-left">
            <a href="map.php" class="btn-back">← VOLVER AL MAPA</a>
            <h1>ALFORJA DEL CABALLERO</h1>
        </div>
        
        <div class="header-right">
            <a href="../api/debug_loot.php" class="btn-debug">🎁 TEST LOOT</a>
        </div>
    </header>

    <main class="inventory-container">
        <?php if (empty($mis_objetos)): ?>
            <div class="empty-msg">
                <p>Tu inventario está vacío. ¡Explora el mapa para encontrar tesoros!</p>
            </div>
        <?php else: ?>
            <div class="inventory-grid">
                <?php foreach ($mis_objetos as $item): ?>
                    <div class="item-card <?php echo $item['rarity']; ?>" data-type="<?php echo $item['type']; ?>">
                        <div class="item-icon">
                            <?php 
                                $icons = [
                                    'weapon'    => '⚔️',
                                    'potion'    => '🧪',
                                    'accessory' => '💍'
                                ];
                                echo $icons[$item['type']] ?? '📦';
                            ?>
                        </div>
                        
                        <h3><?php echo htmlspecialchars($item['name']); ?></h3>
                        
                        <span class="item-type"><?php echo strtoupper($item['type']); ?></span>
                        
                        <p class="item-desc"><?php echo htmlspecialchars($item['description']); ?></p>
                        
                        <?php if ($item['bonus_xp'] > 0): ?>
                            <div class="item-stats">
                                <span class="stat-boost">+<?php echo $item['bonus_xp']; ?> XP</span>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <section class="achievements-section">
        <div class="section-header">
            <h2>🏆 MEDALLAS DE HONOR</h2>
            <p>Tu progreso en el Reino de CodeQuest</p>
        </div>

        <div class="achievements-grid">
            <?php foreach ($allAchievements as $ach): ?>
                <div class="achievement-card <?php echo $ach['is_unlocked'] ? 'unlocked' : 'locked'; ?>">
                    <div class="ach-icon-container">
                        <span class="ach-icon"><?php echo $ach['icon']; ?></span>
                        <?php if ($ach['is_unlocked']): ?>
                            <div class="ach-badge">✓</div>
                        <?php endif; ?>
                    </div>
                    <div class="ach-info">
                        <span class="ach-name"><?php echo htmlspecialchars($ach['name']); ?></span>
                        <p class="ach-desc"><?php echo htmlspecialchars($ach['description']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <script src="assets/js/notifications.js"></script>
    <?php checkNotifications(); ?>

</body>
</html>