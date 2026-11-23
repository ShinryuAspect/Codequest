<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>¡Victoria! - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/victory.css">
</head>
<body class="victory-page">
    <div class="victory-card">
        <h1>¡MISIÓN CUMPLIDA!</h1>
        <p>Has ganado <strong>25 XP</strong></p>
        
        <?php if ($item): ?>
            <div class="loot-reveal" id="loot-container">
                <p>Has encontrado un objeto:</p>
                <div class="item-won">✨ <?php echo htmlspecialchars($item['name']); ?> ✨</div>
            </div>
        <?php endif; ?>

        <div class="actions">
            <a href="map.php" class="btn-play">VOLVER AL MAPA</a>
        </div>
    </div>

    <script src="assets/js/victory-effects.js"></script>
</body>
</html>