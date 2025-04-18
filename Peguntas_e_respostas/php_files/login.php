<?php
$mensagem = '';
require_once 'db_connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = htmlspecialchars($_POST['nome']);
    $numero = htmlspecialchars($_POST['numero']);
    $senha = $_POST['senha'];

    $sql = "SELECT nome, numero, senha FROM `usuarios` WHERE nome = ? AND numero = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("si", $nome, $numero);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $user = $result->fetch_assoc();
            
            if (password_verify($senha, $user['senha'])) {
                $_SESSION['usuario'] = $user['nome']; // Armazena o nome do usuário na sessão
                $_SESSION['numero'] = $user['numero'];
                header("Location: home.php"); // Redireciona para a página home.php
                exit();
            } else {
                $mensagem = '<p class="text-danger">Senha incorreta</p>';
            }
        } else {
            $mensagem = '<p class="text-danger">Usuário não existente</p>';
        }
    } else {
        echo "Falha na consulta";
        die;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form class="bg-white p-5 rounded shadow" style="min-width: 300px;" action="login.php" method="post">
            <div class="d-flex justify-content-center display-6 mb-3">Login</div>
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
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a href="register.php">Crie uma conta</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <div>
                <?php if (isset($mensagem)) { ?>
                    <?php echo $mensagem; ?>
                <?php } ?>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
