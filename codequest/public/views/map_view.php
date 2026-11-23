<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mapa - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/map.css">
</head>
<body class="map-page">
    <header class="game-hud">
        <div class="user-identity">
            <div class="avatar-circle">
                <?php 
                    $iconos = [
                        'Technomancer' => '⚡',
                        'Warrior'      => '🛡️',
                        'Mage'         => '🔮'
                    ];
                    echo $iconos[$avatar] ?? '👤'; 
                ?>
            </div>
            <div class="user-details">
                <span class="user-name"><?php echo htmlspecialchars($username); ?></span>
                <span class="user-class"><?php echo htmlspecialchars($avatar); ?></span>
            </div>
        </div>
        
        <div class="stats-container">
            <div class="stat-item">
                <span class="label">NIVEL</span>
                <span class="value"><?php echo floor($xp / 100) + 1; ?></span>
            </div>
            <div class="stat-item">
                <span class="label">XP TOTAL</span>
                <span class="value"><?php echo $xp; ?></span>
            </div>
        </div>

        <nav class="hud-actions">
            <a href="inventory.php" class="hud-btn" title="Inventario">🎒</a>
            <a href="../api/logout.php" class="hud-btn logout" title="Cerrar Sesión">🚪</a>
        </nav>
    </header>

    <main class="map-container">
        <h2 class="map-title">Misiones Disponibles</h2>
        
        <div class="mission-grid">
            <?php foreach ($niveles as $nivel): ?>
                <?php $locked = ($xp < $nivel['min_xp']); ?>
                
                <div class="mission-node <?php echo $locked ? 'locked' : ''; ?>">
                    <div class="node-icon"><?php echo $nivel['icon']; ?></div>
                    <h3><?php echo $nivel['name']; ?></h3>
                    <p>Requerido: <?php echo $nivel['min_xp']; ?> XP</p>
                    
                    <?php if (!$locked): ?>
                        <a href="<?php echo $nivel['file']; ?>" class="btn-play">DESPLEGAR</a>
                    <?php else: ?>
                        <span class="lock-msg">Bloqueado</span>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
</body>
</html>