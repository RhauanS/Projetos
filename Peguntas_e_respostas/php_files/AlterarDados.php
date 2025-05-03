<?php
require_once 'protege.php';

if (!isset($_SESSION['usuario'])) {

    header("Location: login.php");
    exit();
}


$_SESSION['numero'];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabela Responsiva</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container-fluid">

            <a class="navbar-brand" href="#">
                Olá, <?php echo htmlspecialchars($_SESSION['usuario']); ?>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Nav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="Nav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="AlterarDados.php">Alterar Dados</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
                </ul>

                <!-- Botão "Sair" -->
                <form action="logout.php" method="post" class="form-inline ml-md-auto mt-2 mt-md-0">
                    <button type="submit" class="btn btn-info btn-sm rounded-pill px-4">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <div class="container mt-5">
        <h2 class="mb-4 d-flex justify-content-center">Seu Cadastro</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>Numero</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td><?php echo htmlspecialchars($_SESSION['usuario']) ?></td>
                        <td><?php echo htmlspecialchars($_SESSION['numero']) ?></td>
                        <td>
                            <form action="editar.php" method="post">                                
                                <input type="hidden" name="nome" value="<?php echo $_SESSION['usuario']; ?>">
                                <input type="hidden" name="numero" value="<?php echo $_SESSION['numero']; ?>">
                                <button class="btn btn-warning btn-sm">Editar</button>
                            </form>
                            <form action="excluir.php" method="post">                                
                                <input type="hidden" name="nome" value="<?php echo $_SESSION['usuario']; ?>">
                                <input type="hidden" name="numero" value="<?php echo $_SESSION['numero']; ?>">
                                <button class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
