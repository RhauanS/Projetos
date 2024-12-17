<?php
session_start();
include 'dbconnection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = htmlspecialchars($_POST['email']);
    $senha = htmlspecialchars($_POST['senha']);

    // Consultar o banco de dados
    $sql = 'SELECT * FROM perfil WHERE Email = ?';
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Verificar a senha usando password_verify
            if (password_verify($senha, $user['Senha'])) {
                // Se a senha estiver correta, cria a sessão
                $_SESSION['autenticado'] = true;
                $_SESSION['nome_usuario'] = $user['Nome'];
                header('location: home.php'); // Corrigido
            } else {
                $feedback = '<div class="text-warning d-flex justify-content-center align-items-center">Email ou Senha incorreto</div>';
            }
        } else {
            $feedback = '<div class="text-warning d-flex justify-content-center align-items-center">Usuario não encontrado</div>';
        }
    } else {
        echo "<script>alert('Erro ao preparar a consulta.')</script>";
    }
}

$conn->close();
?>


<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/style.css" />

</head>

<body>
    <section class="py-5 mt-5">
        <div class="container">
            <fieldset>
                <legend>Login</legend>
                <div class="row justify-content-center align-items-center">
                    <!-- Coluna de boas-vindas -->
                    <div class="col-md-6 mb-4">
                        <h2 class="mb-3 text-primary">Seja Bem-Vindo!</h2>
                        <p class="lead">
                            Faça o login para usar nossas funcionalidades e aproveitar o
                            melhor da nossa plataforma.
                        </p>
                    </div>

                    <!-- Coluna do formulário -->
                    <div class="col-md-6">
                        <form
                            id="myForm"
                            autocomplete="off"
                            method="post"
                            action="">


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
                            </div>
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <a id="links_modificar" href="register.php">Crie uma conta</a>
                            </div>
                            <?php if (isset($feedback)) {
                                echo $feedback;
                            } ?>

                            <!-- Botão de envio -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">
                                    Entrar
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