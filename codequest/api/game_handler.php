<?php
ob_start();
require_once '../config/config.php';
require_once '../config/db.php';

header('Content-Type: application/json');

$response = ['success' => false, 'message' => 'Acción no permitida'];

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Sesión expirada']);
    exit();
}

$action = $_GET['action'] ?? '';
$user_id = $_SESSION['user_id'];

try {
    if ($action === 'add_xp') {
        $xp_to_add = intval($_POST['xp'] ?? 0);
        $stmt = $pdo->prepare("UPDATE users SET xp = xp + ? WHERE id = ?");
        $stmt->execute([$xp_to_add, $user_id]);
        $_SESSION['xp'] += $xp_to_add;
        $response = ['success' => true, 'new_xp' => $_SESSION['xp']];
    } 
    elseif ($action === 'grant_item') {
        $item_name = $_POST['item_name'] ?? 'Objeto Misterioso';
        $item_type = $_POST['item_type'] ?? 'tesoro';
        $stmt = $pdo->prepare("INSERT INTO inventory (user_id, item_name, item_type) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $item_name, $item_type]);
        $response = ['success' => true, 'item' => $item_name];
    }
} catch (PDOException $e) {
    $response['message'] = 'Error de DB: ' . $e->getMessage();
}

ob_end_clean();
echo json_encode($response);
exit();