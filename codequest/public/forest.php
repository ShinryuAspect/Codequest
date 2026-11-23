<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>El Bosque del Debugger - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/forest.css">
</head>
<body>

    <header class="game-header">
        <span>🌳 Bosque del Debugger / Nivel 1</span>
        <a href="index.php" class="btn-logout">Escapar al Mapa</a>
    </header>

    <main class="game-container">
        <section class="panel lore-panel">
            <h2 style="color: var(--terminal-green);">🕷️ El Glitch Arácnido</h2>
            <p>Un error de CSS ha hecho que el <b>Cofre del Tesoro</b> sea invisible y pequeño.</p>
            <p><b>Misión:</b> Añade las propiedades necesarias al selector <code>#cofre</code> para que sea visible.</p>
            <ul>
                <li>Color de fondo: <code>saddlebrown</code></li>
                <li>Ancho y alto: <code>100px</code></li>
                <li>Borde: <code>4px solid #f9d423</code></li>
            </ul>
        </section>

        <section class="panel editor-panel">
            <div id="render-area">
                <div id="cofre"></div> <p id="forest-msg">El bosque está en silencio...</p>
            </div>
            
            <textarea id="cssEditor" placeholder="#cofre { ... }"></textarea>
            <button class="btn-cast" onclick="aplicarEstilo()">USAR LUPA DE SINTAXIS</button>
        </section>

        <section class="panel result-panel">
            <h3>🔮 Estado del Bosque</h3>
            <div id="output">El glitch persiste...</div>
        </section>
    </main>

    <script src="assets/js/forest.js"></script>
</body>
</html>