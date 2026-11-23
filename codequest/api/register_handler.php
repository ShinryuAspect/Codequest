<?php
ob_start();
require_once '../config/config.php';
require_once '../config/db.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Error en la forja'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';
    $avatar   = $_POST['avatar_type'] ?? 'Technomancer';

    if (strlen($username) < 4 || strlen($username) > 15) {
        $response['message'] = 'El nombre debe tener entre 4 y 15 caracteres.';
    }
    elseif (!ctype_alnum($username)) {
        $response['message'] = 'El nombre solo puede contener letras y números.';
    }
    elseif (strlen($password) < 8 || !preg_match("/[A-Za-z]/", $password) || !preg_match("/[0-9]/", $password)) {
        $response['message'] = 'La contraseña debe tener al menos 8 caracteres, una letra y un número.';
    }
    else {
        try {
            $check = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $check->execute([$username]);

            if ($check->rowCount() > 0) {
                $response['message'] = 'Este nombre ya ha sido reclamado por otro guerrero.';
            } else {
                $hashed = password_hash($password, PASSWORD_BCRYPT);
                $stmt = $pdo->prepare("INSERT INTO users (username, password, avatar_type, xp) VALUES (?, ?, ?, 0)");
                
                if ($stmt->execute([$username, $hashed, $avatar])) {
                    $response['success'] = true;
                    $response['message'] = '¡Identidad forjada con éxito!';
                }
            }
        } catch (PDOException $e) {
            $response['message'] = 'Error en los anales del reino (DB).';
        }
    }
}

ob_end_clean();
echo json_encode($response);
exit();