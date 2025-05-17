<?php
require_once 'db_connection.php';
require_once 'protege.php';


$mensagem = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $nome = isset($_POST['nome']) ? htmlspecialchars($_POST['nome']) : '';
    $numero = isset($_POST['numero']) ? htmlspecialchars($_POST['numero']) : '';
    $novo_nome = isset($_POST['novo_nome']) ? htmlspecialchars($_POST['novo_nome']) : '';
    $novo_numero = isset($_POST['novo_numero']) ? htmlspecialchars($_POST['novo_numero']) : '';

    
    if (!is_numeric($novo_numero)) {
        $mensagem = 'O número deve conter apenas dígitos.';
    } else {
        
        $sql = "UPDATE usuarios SET nome = ?, numero = ? WHERE nome = ? AND numero = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssis', $novo_nome, $novo_numero, $nome, $numero);
        if ($stmt->execute()) {        
            $_SESSION['usuario'] = $novo_nome;
            $_SESSION['numero'] = $novo_numero;
            $mensagem = 'Cadastro atualizado com sucesso!';
            header('Location: AlterarDados.php');
        } else {
            $mensagem = 'Erro ao atualizar os dados.';
        }
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Cadastro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Editar Cadastro</h2>


        <?php if (!empty($mensagem)): ?>
            <div class="alert alert-info"><?php echo $mensagem; ?></div>
        <?php endif; ?>

        <form action="editar.php" method="post" class="p-5 rounded shadow">
            <div class="form-group">
                <label for="novo_nome">Novo Nome</label>
                <input type="text" class="form-control" id="novo_nome" name="novo_nome" value="<?php echo htmlspecialchars($_SESSION['usuario']); ?>" required>
            </div>
            <div class="form-group">
                <label for="novo_numero">Novo Número</label>
                <input type="text" class="form-control" id="novo_numero" name="novo_numero" value="<?php echo htmlspecialchars($_SESSION['numero']); ?>" required>
            </div>
            <input type="hidden" name="nome" value="<?php echo htmlspecialchars($_SESSION['usuario']); ?>">
            <input type="hidden" name="numero" value="<?php echo htmlspecialchars($_SESSION['numero']); ?>">
            <button type="submit" class="btn btn-primary btn-block">Salvar</button>
            
        </form>
    </div>
</body>
</html>
