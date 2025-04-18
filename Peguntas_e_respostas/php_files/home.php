<?php
require_once 'protege.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome (ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

    <!-- NAVBAR -->
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
                    <li class="nav-item"><a class="nav-link" href="#">Início</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sobre</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contato</a></li>
                </ul>

                <!-- Botão "Sair" alinhado à direita -->
                <form action="logout.php" method="post" class="form-inline ml-md-auto mt-2 mt-md-0">
                    <button type="submit" class="btn btn-info btn-sm rounded-pill px-4">
                        <i class="fas fa-sign-out-alt"></i> Sair
                    </button>
                </form>
            </div>

        </div>
    </nav>

    <!-- CONTEÚDO -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12" style="border: 1px solid black; height: 100px;">
                Conteúdo centralizado com largura cheia.
            </div>
        </div>
    </div>

    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
