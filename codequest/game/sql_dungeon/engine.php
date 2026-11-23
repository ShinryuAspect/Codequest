<?php
require_once '../../config/config.php';
require_once '../../config/db.php';

function conectarSandbox(): PDO {
    $host = getenv('CQ_SANDBOX_HOST') ?: 'localhost';
    $user = getenv('CQ_SANDBOX_USER') ?: 'cq_sandbox';
    $pass = getenv('CQ_SANDBOX_PASS') ?: '';
    return new PDO("mysql:host=$host;dbname=codequest_sandbox;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
}

function e($valor): string {
    return htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8');
}

function otorgarRecompensa(PDO $pdo_main, int $puntos): void {
    if (!isset($_SESSION['user_id']) || !empty($_SESSION['sql_key_rewarded'])) {
        return;
    }
    $stmt = $pdo_main->prepare("UPDATE users SET xp = xp + :puntos WHERE id = :id");
    $stmt->execute(['puntos' => $puntos, 'id' => $_SESSION['user_id']]);
    $_SESSION['xp'] += $puntos;
    $_SESSION['sql_key_rewarded'] = true;

    echo "<div style='background: #1a1a2e; border: 2px solid gold; padding: 10px; margin-top: 10px; text-align: center;'>";
    echo "<h3 style='color: gold; margin: 0;'>✨ ¡MISIÓN CUMPLIDA! ✨</h3>";
    echo "<p style='margin: 5px 0;'>Has ganado <b>" . (int) $puntos . " XP</b>. Tu leyenda crece.</p>";
    echo "</div>";
}

$query = trim($_POST['query'] ?? '');
if ($query === '') {
    exit;
}

if (!preg_match('/^select\b/i', $query)) {
    echo "<div class='error-msg'>⚠️ Solo se permiten hechizos de consulta (SELECT).</div>";
    exit;
}

try {
    $res = conectarSandbox()->query($query)->fetchAll(PDO::FETCH_ASSOC);

    if (!$res) {
        echo "<p>El hechizo no devolvió resultados.</p>";
        exit;
    }

    echo "<table><tr>";
    foreach (array_keys($res[0]) as $h) {
        echo "<th>" . e($h) . "</th>";
    }
    echo "</tr>";

    $llave_encontrada = false;
    foreach ($res as $row) {
        echo "<tr>";
        foreach ($row as $v) {
            echo "<td>" . e($v) . "</td>";
        }
        echo "</tr>";
        if (in_array('Llave de Plata', $row, true)) {
            $llave_encontrada = true;
        }
    }
    echo "</table>";

    if ($llave_encontrada) {
        otorgarRecompensa($pdo, 50);
    }
} catch (PDOException $e) {
    echo "<div class='error-msg'>⚠️ Error de Sintaxia: " . e($e->getMessage()) . "</div>";
}
