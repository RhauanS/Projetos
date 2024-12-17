<?php

require_once 'validar_usuario.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bem-vindo à sua Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light bg-dark">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="nav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="contatos.php">Contatos</a>
                        </li>
                    </ul>

                    <!-- Exibe o nome do usuário e o botão dropdown à direita -->
                    <div class="d-flex align-items-center">
                        <span class="text-white me-3">Bem-vindo, <?php echo $_SESSION['nome_usuario']; ?>!</span>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                Opções de Conta
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <li><a class="dropdown-item" href="perfil.php">Perfil</a></li>
                                <li><a class="dropdown-item" href="configuracoes.php">Configurações</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Sair</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <h1 class="text-center text-primary mt-5">Página Inicial</h1>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>