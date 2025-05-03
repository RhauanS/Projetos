<?php
 require_once 'db_connection.php';
 require_once 'protege.php'; 
 
 if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = htmlspecialchars($_SESSION['usuario']);
    $numero = htmlspecialchars($_SESSION['numero']);
    $sql = "DELETE FROM usuarios WHERE nome = ? AND numero = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $nome, $numero);
    $stmt->execute();
    session_unset();
    session_destroy();
    header('Location: home.php');
    $stmt->close();
 }

 $conn->close();


