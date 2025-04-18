<?php
require_once 'db_connection.php';
session_start();
$mensagem = '';

if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $nome = htmlspecialchars($_POST['nome']);
    $numero = htmlspecialchars($_POST['numero']);
    $senha = htmlspecialchars($_POST['senha']);
    $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verifica se o usuário já existe
    $sql = 'SELECT * FROM `usuarios` WHERE nome = ? AND numero = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('si', $nome, $numero);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0){
        $mensagem = '<div class = "text-danger">USUÁRIO JÁ CADASTRADO</div>';
        $stmt->close();
    } else {
        $stmt->close(); // Fechar antes de reutilizar

        $sql = 'INSERT INTO usuarios(nome, numero, senha) VALUES (?, ?, ?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sis', $nome, $numero, $senha_hash);
        $stmt->execute();
        $mensagem = '<div class = "text-primary">USUÁRIO CADASTRADO COM SUCESSO</div>';
        $stmt->close();
    }

    $conn->close();
}



?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projeto Bootstrap Completo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="../javascript_files/script.js"></script>
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form class="bg-white p-5 rounded shadow" style="min-width: 300px;" action="register.php" method="post">
        <div class="d-flex justify-content-center display-6 mb-3">Cadastre-se</div>
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número</label>
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
                <p id="senha_resultado"></p>
            </div>
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
            <div>
                <?php if(isset($mensagem)){?>
                    <?php echo $mensagem; ?>
                <?php } ?>    
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
