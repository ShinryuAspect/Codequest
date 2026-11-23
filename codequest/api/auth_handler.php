<?php
ob_start();

require_once '../config/config.php';
require_once '../config/db.php';

header('Content-Type: application/json');

$response = [
    'success' => false,
    'message' => 'Error de conexión con el servidor'
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username)) {
        $json_data = json_decode(file_get_contents('php://input'), true);
        if ($json_data) {
            $username = $json_data['username'] ?? '';
            $password = $json_data['password'] ?? '';
        }
    }

    try {
        if (!empty($username) && !empty($password)) {
            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id']  = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['xp']       = (int)$user['xp'];
                $_SESSION['avatar']   = $user['avatar_type'];

                session_write_close();

                $response['success'] = true;
                $response['message'] = '¡Bienvenido, ' . $username . '!';
            } else {
                $response['message'] = 'Nombre de usuario o contraseña incorrectos';
            }
        } else {
            $response['message'] = 'Por favor, completa todos los campos';
        }
    } catch (PDOException $e) {
        $response['message'] = 'Error en el Oráculo (DB): ' . $e->getMessage();
    }
} else {
    $response['message'] = 'Método de petición no permitido';
}

ob_end_clean();
echo json_encode($response);
exit();