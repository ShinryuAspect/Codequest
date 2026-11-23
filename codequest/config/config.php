<?php
session_set_cookie_params(['path' => '/', 'httponly' => true, 'samesite' => 'Lax']);
if (session_status() === PHP_SESSION_NONE) session_start();

define('ROOT_PATH', dirname(__DIR__) . '/');

require_once ROOT_PATH . 'api/functions.php';
