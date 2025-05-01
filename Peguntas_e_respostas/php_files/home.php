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
    <script src="../javascript_files/script_questoes.js"></script>
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

                <!-- Botão "Sair" -->
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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <fieldset class="border p-4 rounded shadow-sm bg-white ">
                    <legend class="w-auto px-2 font-weight-bold ">Questões</legend>
                    <label class="h5 mb-3">Em qual ano o Brasil foi descoberto?</label>

                    <select id="seletor1" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option>1500</option>
                        <option>2500</option>
                        <option>568</option>
                        <option>2009</option>
                    </select>

                    <p id="resultado1" class="font-weight-bold"></p>

                </fieldset>

                <fieldset class="border p-4 rounded shadow-sm bg-white ">
                    <legend class="w-auto px-2 font-weight-bold ">Questões</legend>
                    <label class="h5 mb-3">Qual das opções representa corretamente a saída do seguinte código em Python?
                        x = 5
                        y = 3

                        if x > y:
                        print("A")
                        else:
                        print("B")
                    </label>

                    <select id="seletor2" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option>B</option>
                        <option>A</option>
                        <option>Erro de sintaxe</option>
                        <option>Nada sera impresso</option>
                    </select>

                    <p id="resultado2" class="font-weight-bold"></p>

                </fieldset>


                <fieldset class="border p-4 rounded shadow-sm bg-white ">
                    <legend class="w-auto px-2 font-weight-bold ">Questões</legend>
                    <label class="h5 mb-3">Qual será a saída do seguinte código em Python?
                        for i in range(1, 6):
                        if i % 2 == 0:
                        print(i)
                    </label>

                    <select id="seletor3" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option>1 2 3 4 5</option>
                        <option>2 4</option>
                        <option>1 3 5</option>
                        <option>0 2 4</option>
                    </select>

                    <p id="resultado3" class="font-weight-bold"></p>

                </fieldset>
            </div>
        </div>
    </div>



    <!-- Scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>