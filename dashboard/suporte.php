<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado, caso contrário, redirecionar para login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
include('../db.php');

// Obter o ID do usuário logado
$user_id = $_SESSION['user_id'];

// Buscar informações do usuário
$query = "SELECT nome, telefone, usuario, data_nascimento, genero, foto_perfil, senha FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Inicializar variável para a mensagem de confirmação
$mensagem_confirmacao = "";

// Verificar se o formulário de suporte foi enviado
if (isset($_POST['enviar_mensagem'])) {
    $mensagem_suporte = $_POST['mensagem_suporte'];
    $destinatario = "conectefacilsuporte@gmail.com";
    $assunto = "Mensagem de Suporte de " . $user['nome'];
    $corpo = "Mensagem de: " . $user['nome'] . "\n\n" . $mensagem_suporte;

    // Enviar o email
    if (mail($destinatario, $assunto, $corpo)) {
        $mensagem_confirmacao = "Mensagem enviada com sucesso!";
    } else {
        $mensagem_confirmacao = "Erro ao enviar a mensagem.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../css/dashboard.css">
    <!--favicons -->
    <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <title>Configurações</title>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <img src="../img/logo_sec.png" class="bx bxs-smile" alt="">
        </a>
        <ul class="side-menu top">
            <li>
                <a href="inicio.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Início</span>
                </a>
            </li>
            <li>
                <a href="meus_cursos.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Meus Conteúdos</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Suporte</span> </a>
                </a>
            </li>

        </ul>
        <ul class="side-menu">
            <li class="active">
                <a href="config.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Configurações</span>
                </a>
            </li>
            <li>
                <a href="../logout.php" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Sair da Conta</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <a href="#" class="nav-link">Menu</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <div class="profile">
                <img id="profilePic" src="uploads/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil"
                    onclick="toggleProfileMenu()">
                <div id="profileMenu" class="profile-menu">
                    <ul>
                        <li><a href="config.php">Configurações</a></li>
                        <li><a href="../logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <h1>Olá, <?php echo $user['nome']; ?>!</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Painel</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="#">Suporte</a>
                        </li>
                        <li>
                            <p>Veja como entrar em contato para tirar dúvidas.</p>
                        </li>
                    </ul>
                </div>
            </div>
            <hr>
            <br>

            <div class="head-title">
                <div class="left">
                    <h1>Envie sua dúvida ou problema.</h1>
                </div>
            </div>

            <!-- Formulário de Suporte -->
            <div class="support-form">
                <form method="POST">
                    <label for="mensagem_suporte">Escreva sua mensagem:</label>
                    <textarea id="mensagem_suporte" name="mensagem_suporte" rows="5" required></textarea>
                    <button type="submit" name="enviar_mensagem" class="btn btn-primary">Enviar Mensagem</button>
                </form>
                <?php if (isset($mensagem_confirmacao)) { ?>
                    <p><?php echo $mensagem_confirmacao; ?></p>
                <?php } ?>
            </div>
        </main>
    </section>


    <script>
        // Função para exibir/esconder o menu de perfil
        function toggleProfileMenu() {
            var menu = document.getElementById('profileMenu');
            menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
        }

        // Fechar o menu de perfil ao clicar fora dele
        window.onclick = function (event) {
            if (!event.target.matches('#profilePic')) {
                var menu = document.getElementById('profileMenu');
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                }
            }
        }
    </script>

    <script>
        document.querySelector('.bx-menu').addEventListener('click', function () {
            var sidebar = document.getElementById('sidebar');
            var menuIcon = document.querySelector('.bx-menu');

            // Alterna a classe 'active' na sidebar
            sidebar.classList.toggle('active');

            // Move o ícone de menu junto com a sidebar
            if (sidebar.classList.contains('active')) {
                menuIcon.style.left = '90%'; // Move o ícone para a direita
            } else {
                menuIcon.style.left = '10px'; // Retorna o ícone para o canto esquerdo
            }
        });
    </script>
</body>

</html>