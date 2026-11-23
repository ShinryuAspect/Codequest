<?php
require_once '../config/config.php';

if (!isset($_SESSION['user_id']) || ($_SESSION['xp'] < 100)) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Torre de Desafíos - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/tower.css">
</head>
<body>

    <header class="game-header">
        <span>🏰 La Cumbre de Sintaxia / Boss Fight</span>
        <a href="index.php" class="btn-logout">Huir del Duelo</a>
    </header>

    <main class="battle-arena">
        <section class="boss-section">
            <div id="boss-sprite">👾</div>
            <h2 id="boss-name">Centinela de Sintaxis</h2>
            <div class="hp-bar-container">
                <div id="hp-fill"></div>
            </div>
            <p id="hp-text">HP: 100 / 100</p>
        </section>

        <section class="combat-panel">
            <div id="question-box">
                <p id="challenge-text">¡Prepárate para el duelo, SirLink!</p>
                <div id="options-container">
                    </div>
            </div>
        </section>

        <section class="battle-log" id="battle-log">
            <p>El Centinela te observa fríamente...</p>
        </section>
    </main>

    <script src="assets/js/tower.js"></script>
</body>
</html>