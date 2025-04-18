<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario']) || !isset($_SESSION['numero'])) {
    header('Location: login.php');
    exit();
}


?>
