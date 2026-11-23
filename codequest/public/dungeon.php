<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mina de SQL - CodeQuest</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/dungeon.css">
</head>
<body>

    <header class="game-header">
        <span>📍 Minas de SQL / Nivel 1</span>
        <a href="index.php" style="color: var(--accent-blue); text-decoration: none;">⬅ Volver al Mapa</a>
    </header>

    <main class="game-container">
        <section class="lore-panel">
            <h2 style="color: var(--gold);">📜 El Encargo</h2>
            <p>SirLin, las sombras han ocultado la <b>Llave de Plata</b>.</p>
            <p>Usa tus conocimientos de SQL para encontrarla en la tabla <code>objetos_perdidos</code>.</p>
            <hr style="border: 0; border-top: 1px solid #1a1a2e; margin: 20px 0;">
            <p><small>Prueba con: <code>SELECT * FROM objetos_perdidos;</code></small></p>
        </section>

        <section class="editor-panel">
            <textarea id="codeEditor" placeholder="Escribe tu sentencia SQL..."></textarea>
            <button class="btn-cast" onclick="lanzarHechizo()">EJECUTAR QUERY</button>
        </section>

        <section class="result-panel" id="resultConsole">
            <h3 style="color: var(--accent-blue);">🔮 Oráculo</h3>
            <div id="output">Esperando comandos...</div>
        </section>
    </main>

    <script src="assets/js/dungeon.js"></script>
</body>
</html>