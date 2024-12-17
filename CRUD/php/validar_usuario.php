<?php
session_start(); // Certifique-se de que a sessão está iniciada

if (isset($_SESSION['autenticado']) && $_SESSION['autenticado'] == true) {
    $_SESSION['nome_usuario'];
} else {
    header('location: login.php'); // Corrigido o erro de sintaxe
    exit(); // Importante usar exit() após header para garantir que o script não continue executando
}
