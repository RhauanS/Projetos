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

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            let pontuacao = 0;

            function verificarResposta(seletorId, respostaCerta, resultadoId) {
                let seletor = document.getElementById(seletorId);
                let resultado = document.getElementById(resultadoId);

                seletor.addEventListener('change', function() {
                    if (seletor.value === respostaCerta) {
                        resultado.textContent = 'Certa Resposta';
                        resultado.style.color = 'green';
                        pontuacao += 1;
                    } else {
                        resultado.textContent = 'Resposta errada';
                        resultado.style.color = 'red';
                        pontuacao -= 1;
                    }

                    document.getElementById('pontuacao').innerHTML = 'Pontuação: ' + pontuacao;
                });
            }

            
            verificarResposta('seletor1', '1500', 'resultado1');
            verificarResposta('seletor2', 'C', 'resultado2');
            verificarResposta('seletor3', '2 4', 'resultado3');
            verificarResposta('seletor4', 'Canberra', 'resultado4');
            verificarResposta('seletor5', 'Júpiter', 'resultado5');
            verificarResposta('seletor6', 'Machado de Assis', 'resultado6');
            verificarResposta('seletor7', '26', 'resultado7');
            verificarResposta('seletor8', 'Hidrogênio', 'resultado8');
            verificarResposta('seletor9', 'Leonardo da Vinci', 'resultado9');
            verificarResposta('seletor10', 'África', 'resultado10');
            verificarResposta('seletor11', '3.14', 'resultado11');
            verificarResposta('seletor12', 'Golfinho', 'resultado12');
            verificarResposta('seletor13', 'Newton', 'resultado13');
        });
    </script>
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
                <div style="width: 100px; height: 100px;" id="pontuacao">Pontuação: 0</div>
                <fieldset class="border p-4 rounded shadow-sm bg-white ">
                    <legend class="w-auto px-2 font-weight-bold ">Questões</legend>
                    
                    <!-- Questão 1 -->
                    <label class="h5 mb-3">Em qual ano o Brasil foi descoberto?</label>
                    <select id="seletor1" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option>1500</option>
                        <option>2500</option>
                        <option>568</option>
                        <option>2009</option>
                    </select>
                    <p id="resultado1" class="font-weight-bold"></p>

                    <!-- Questão 2 -->
                    <label class="h5 mb-3">Quem foi o primeiro presidente do Brasil após a queda da monarquia?</label>
                    <select id="seletor2" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="A">Fernando Henrique Cardoso</option>
                        <option value="B">Lula</option>
                        <option value="C">Deodoro da Fonseca</option>
                        <option value="D">Napoleão Bonaparte</option>
                    </select>
                    <p id="resultado2" class="font-weight-bold"></p>

                    <!-- Questão 3 -->
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

                    <!-- Questão 4 -->
                    <label class="h5 mb-3">Qual é a capital da Austrália?</label>
                    <select id="seletor4" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Sydney">Sydney</option>
                        <option value="Melbourne">Melbourne</option>
                        <option value="Canberra">Canberra</option>
                        <option value="Perth">Perth</option>
                    </select>
                    <p id="resultado4" class="font-weight-bold"></p>

                    <!-- Questão 5 -->
                    <label class="h5 mb-3">Qual é o maior planeta do sistema solar?</label>
                    <select id="seletor5" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Terra">Terra</option>
                        <option value="Saturno">Saturno</option>
                        <option value="Marte">Marte</option>
                        <option value="Júpiter">Júpiter</option>
                    </select>
                    <p id="resultado5" class="font-weight-bold"></p>

                    <!-- Questão 6 -->
                    <label class="h5 mb-3">Quem escreveu "Dom Casmurro"?</label>
                    <select id="seletor6" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Machado de Assis">Machado de Assis</option>
                        <option value="Clarice Lispector">Clarice Lispector</option>
                        <option value="Graciliano Ramos">Graciliano Ramos</option>
                        <option value="Carlos Drummond">Carlos Drummond</option>
                    </select>
                    <p id="resultado6" class="font-weight-bold"></p>

                    <!-- Questão 7 -->
                    <label class="h5 mb-3">Quantos estados tem o Brasil?</label>
                    <select id="seletor7" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                    </select>
                    <p id="resultado7" class="font-weight-bold"></p>

                    <!-- Questão 8 -->
                    <label class="h5 mb-3">Qual é o elemento químico representado por H?</label>
                    <select id="seletor8" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Hidrogênio">Hidrogênio</option>
                        <option value="Hélio">Hélio</option>
                        <option value="Mercúrio">Mercúrio</option>
                        <option value="Oxigênio">Oxigênio</option>
                    </select>
                    <p id="resultado8" class="font-weight-bold"></p>

                    <!-- Questão 9 -->
                    <label class="h5 mb-3">Quem pintou "Mona Lisa"?</label>
                    <select id="seletor9" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Leonardo da Vinci">Leonardo da Vinci</option>
                        <option value="Michelangelo">Michelangelo</option>
                        <option value="Van Gogh">Van Gogh</option>
                        <option value="Picasso">Picasso</option>
                    </select>
                    <p id="resultado9" class="font-weight-bold"></p>

                    <!-- Questão 10 -->
                    <label class="h5 mb-3">Em que continente está o Egito?</label>
                    <select id="seletor10" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Ásia">Ásia</option>
                        <option value="África">África</option>
                        <option value="Europa">Europa</option>
                        <option value="América">América</option>
                    </select>
                    <p id="resultado10" class="font-weight-bold"></p>

                    <!-- Questão 11 -->
                    <label class="h5 mb-3">Qual o valor de π (pi) arredondado com duas casas decimais?</label>
                    <select id="seletor11" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="3.14">3.14</option>
                        <option value="3.15">3.15</option>
                        <option value="3.13">3.13</option>
                        <option value="3.16">3.16</option>
                    </select>
                    <p id="resultado11" class="font-weight-bold"></p>

                    <!-- Questão 12 -->
                    <label class="h5 mb-3">Qual destes animais é um mamífero?</label>
                    <select id="seletor12" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Tubarão">Tubarão</option>
                        <option value="Jacaré">Jacaré</option>
                        <option value="Golfinho">Golfinho</option>
                        <option value="Cobra">Cobra</option>
                    </select>
                    <p id="resultado12" class="font-weight-bold"></p>

                    <!-- Questão 13 -->
                    <label class="h5 mb-3">Quem descobriu a gravidade?</label>
                    <select id="seletor13" class="form-control mb-3">
                        <option disabled selected>Escolha a alternativa</option>
                        <option value="Einstein">Einstein</option>
                        <option value="Galileu">Galileu</option>
                        <option value="Newton">Newton</option>
                        <option value="Copérnico">Copérnico</option>
                    </select>
                    <p id="resultado13" class="font-weight-bold"></p>

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
