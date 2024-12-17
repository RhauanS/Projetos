<?php
session_start();
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validação dos dados do formulário
    $nome = htmlspecialchars($_POST['nome']);
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Verificação do formato do e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Por favor, insira um e-mail válido.')</script>";
        exit;
    }

    // Verificação de senha (mínimo de 6 caracteres)
    if (strlen($senha) < 6) {
        echo "<script>alert('A senha deve ter pelo menos 6 caracteres.')</script>";
        exit;
    }

    // Criação do hash para a senha
    $hash = password_hash($senha, PASSWORD_DEFAULT);

    // Verificação se o e-mail já existe no banco de dados
    if ($stmt = $conn->prepare("SELECT * FROM perfil WHERE Email = ?")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Usuário já cadastrado com esse Email.')</script>";
            $stmt->close(); // Fechando a declaração preparada
            $conn->close(); // Fechando a conexão
            exit;
        } else {
            // Inserção de dados no banco de dados
            $sql = "INSERT INTO perfil (Nome, Email, Senha) VALUES (?, ?, ?)";
            if ($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("sss", $nome, $email, $hash);
                if ($stmt->execute()) {
                    $mensagem = "Usuario cadastrado com sucesso!";
                } else {
                    echo "<script>alert('Erro ao realizar o cadastro.')</script>";
                }
            } else {
                echo "<script>alert('Erro durante a execução da consulta SQL.')</script>";
            }
        }
    } else {
        echo "<script>alert('Erro ao preparar a consulta.')</script>";
    }

    // Fechando as declarações preparadas e a conexão
    $stmt->close();
    $conn->close();
}
?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Cadastro</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/script.js"></script>
</head>

<body>
    <section class="py-5 mt-5">
        <div class="container">
            <fieldset>
                <legend>Cadastro</legend>
                <div class="row justify-content-center align-items-center">
                    <!-- Coluna de boas-vindas -->
                    <div class="col-md-6 mb-4">
                        <h2 class="mb-3 text-primary">Seja Bem-Vindo!</h2>
                        <p class="lead">
                            Cadastre-se para usar nossas funcionalidades e aproveitar o
                            melhor da nossa plataforma.
                        </p>
                    </div>

                    <!-- Coluna do formulário -->
                    <div class="col-md-6">
                        <form
                            id="myForm"
                            autocomplete="off"
                            method="post"
                            action="../php/register.php">
                            <!-- Nome -->
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="nome"
                                    name="nome"
                                    placeholder="Digite seu nome" />
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Digite seu email" />
                            </div>

                            <!-- Senha -->
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input
                                    type="password"
                                    class="form-control"
                                    id="senha"
                                    name="senha"
                                    placeholder="Crie uma senha" />
                                <div id="senhaFeedback"></div>
                                <!-- Div para feedback da senha -->
                                <?php if (isset($mensagem)) { ?>
                                    <p class='d-flex justify-content-center align-items-center text-primary'><?php echo $mensagem; ?></p>
                                <?php } ?>

                            </div>

                            <!-- Botão de envio -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-light text-primary">
                                    Cadastrar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </fieldset>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>