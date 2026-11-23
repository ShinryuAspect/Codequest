<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Altar de JS - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/challenge.css">
</head>
<body>

    <header class="game-header">
        <span>⚡ El Altar de JS / Nivel 1</span>
        <a href="index.php" class="btn-logout">Volver al Mapa</a>
    </header>

    <main class="game-container">
        <section class="panel lore-panel">
            <h2 style="color: #f7df1e;">⚡ La Cerradura Lógica</h2>
            <p>SirLink, este cofre está sellado con un código dinámico.</p>
            <p>Para abrirlo, debes definir tres variables:</p>
            <ul>
                <li><code>fuerza</code> debe ser 10.</li>
                <li><code>magia</code> debe ser 20.</li>
                <li><code>codigoFinal</code> debe ser la <b>suma</b> de ambas.</li>
            </ul>
        </section>

        <section class="panel editor-panel">
            <div id="lock-display">
                <div id="digit">?</div>
                <p>ESTADO: BLOQUEADO</p>
            </div>
            
            <textarea id="jsEditor" placeholder="// Define tus variables aquí..."></textarea>
            <button class="btn-cast" onclick="ejecutarLogica()">INTENTAR COMBINACIÓN</button>
        </section>

        <section class="panel result-panel">
            <h3>🔮 Oráculo de Node</h3>
            <div id="output">Esperando flujo de energía...</div>
        </section>
    </main>

    <script src="assets/js/js_challenge.js"></script>
</body>
</html>