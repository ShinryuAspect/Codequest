<?php
function addNotification($text, $type = 'success') {
    if (session_status() === PHP_SESSION_NONE) session_start();
    
    if (!isset($_SESSION['flash_notifications'])) {
        $_SESSION['flash_notifications'] = [];
    }
    $_SESSION['flash_notifications'][] = [
        'text' => $text,
        'type' => $type
    ];
}

function checkNotifications() {
    if (isset($_SESSION['flash_notifications']) && is_array($_SESSION['flash_notifications'])) {
        echo "<script>document.addEventListener('DOMContentLoaded', () => {";
        foreach ($_SESSION['flash_notifications'] as $index => $notif) {
            $msg = addslashes($notif['text']);
            $type = $notif['type'];
            $delay = $index * 300;
            echo "setTimeout(() => { showToast('$msg', '$type'); }, $delay);";
        }
        echo "});</script>";
        unset($_SESSION['flash_notifications']);
    }
}