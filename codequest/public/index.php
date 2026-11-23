<?php
require_once '../config/config.php';
require_once '../config/db.php';

if (isset($_SESSION['user_id'])) {
    header("Location: map.php");
    exit();
}

include 'views/landing_view.php';
?>