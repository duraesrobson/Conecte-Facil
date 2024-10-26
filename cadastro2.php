<?php
// Iniciar a sessão
session_start();

// Incluir o arquivo de conexão com o banco de dados
include('db.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Receber os dados do formulário
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    $telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
    $usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
    $data_nascimento = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
    $genero = mysqli_real_escape_string($conn, $_POST['genero']);
    $senha = mysqli_real_escape_string($conn, $_POST['senha']);
    $confirm_senha = mysqli_real_escape_string($conn, $_POST['confirm_senha']);

    // Verificar se as senhas correspondem
    if ($senha != $confirm_senha) {
        $_SESSION['register_error'] = 'As senhas não correspondem.';
        header('Location: cadastro2.php');
        exit();
    }

    // Verificar se o usuário já existe
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Nome de usuário já existe
        $_SESSION['register_error'] = 'Nome de usuário já existe.';
        header('Location: cadastro2.php');
        exit();
    } else {
        // Criptografar a senha
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);

        // Inserir o novo usuário no banco de dados
        $query = "INSERT INTO usuarios (nome, telefone, usuario, data_nascimento, genero, senha) VALUES ('$nome', '$telefone', '$usuario', '$data_nascimento', '$genero', '$senha_hash')";

        if (mysqli_query($conn, $query)) {
            // Cadastro bem-sucedido
            $_SESSION['register_success'] = 'Usuário cadastrado com sucesso.';
            header('Location: login.php');
            exit();
        } else {
            // Erro ao cadastrar usuário
            $_SESSION['register_error'] = 'Erro ao cadastrar usuário.';
            header('Location: cadastro2.php');
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--favicons -->
     <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">

    
    <link rel="stylesheet" href="css/cadastro2.css">
    <title>Cadastro</title>
    
    <style>
        /* Estilo básico do modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            width: 80%;
            max-width: 400px;
            border-radius: 8px;
            text-align: center;
        }

        .close-btn {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close-btn:hover {
            color: #000;
        }
    </style>
    
</head>

<body>
    
        <div class="form">
              <!-- Exibir mensagens de erro -->
        <?php

        session_start();
        if (isset($_SESSION['register_success'])): ?>
            <div id="successModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn" onclick="closeModal()">&times;</span>
                    <p>Usuário cadastrado com sucesso! Você será redirecionado para a página de login.</p>
                </div>
            </div>
            <?php unset($_SESSION['register_success']); ?>
        <?php endif;
        if (isset($_SESSION['register_error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['register_error'] . '</div>';
            unset($_SESSION['register_error']);
        }

        if (isset($_SESSION['register_success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['register_success'] . '</div>';
            unset($_SESSION['register_success']);
        }

        ?>

            <form action="cadastro.php" method="POST">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastre-se</h1>
                    </div>
                    <div class="login-button">
                        <button><a href="login.php">Entrar</a></button>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="nome">Nome e Sobrenome</label>
                        <input id="nome" type="text" name="nome" placeholder="Digite seu nome e sobrenome" required>
                    </div>

                    <div class="input-box">
                        <label for="usuario">Usuário</label>
                        <input id="usuario" type="text" name="usuario" placeholder="Crie um nome sem espaços para acessar o site" required>
                    </div>
                    <div class="input-box">
                        <label for="data_nascimento">Data de Nascimento</label>
                        <input id="data_nascimento" type="date" name="data_nascimento" placeholder="Digite sua data de nascimento" required>
                    </div>

                    <div class="input-box">
                        <label for="telefone">Celular</label>
                        <input id="telefone" type="tel" name="telefone" placeholder="Digite seu WhatsApp" required>
                    </div>

                    <div class="input-box">
                        <label for="senha">Senha</label>
                        <input id="senha" type="password" name="senha" placeholder="Crie sua senha" minlength="8" required>
                    </div>

                    <div class="input-box">
                        <label for="confirm_senha">Confirme sua Senha</label>
                        <input type="password" name="confirm_senha" placeholder="Digite sua senha novamente" minlength="8" required>
                    </div>

                    <div class="input-box">
                        <label for="genero">Sexo</label>
                        <select name="genero" id="genero" required>
                                <option value="Masculino">Masculino</option>
                                <option value="Feminino">Feminino</option>
                                <option value="Feminino">Prefiro não dizer</option>
                            </select>
                    </div>

                   
                </div>
                <div class="continue-button">
                    <button type="submit">Cadastrar</button>
                </div>
                

                    
                    </div>
                </div>

                
            </form>
        </div>
    </div>
    
    
</body>

</html>
