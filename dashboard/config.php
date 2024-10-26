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

// Inicializar variável para o modal de sucesso
$senha_alterada = false;

// Verificar se o formulário de atualização foi enviado
if (isset($_POST['salvar_senha'])) {
    $senha_atual = $_POST['senha_atual'];
    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    // Verificar se a nova senha e a confirmação são iguais
    if ($nova_senha !== $confirmar_senha) {
        $mensagem = "As senhas não coincidem.";
    } else {
        // Verificar a senha atual no banco de dados
        $sql = "SELECT senha FROM usuarios WHERE id = '$user_id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($row && password_verify($senha_atual, $row['senha'])) {
            // Atualizar a senha no banco de dados
            $nova_senha_hash = password_hash($nova_senha, PASSWORD_DEFAULT);
            $update_sql = "UPDATE usuarios SET senha = '$nova_senha_hash' WHERE id = '$user_id'";

            if (mysqli_query($conn, $update_sql)) {
                $senha_alterada = true; // Define como true se a senha for alterada com sucesso
                $mensagem = "Senha atualizada com sucesso!";
            } else {
                $mensagem = "Erro ao atualizar a senha: " . mysqli_error($conn);
            }
        } else {
            $mensagem = "Senha atual incorreta.";
        }
    }
}
// Verificar se o formulário de alteração de usuário foi enviado
if (isset($_POST['salvar_usuario'])) {
    $novo_usuario = $_POST['novo_usuario'];

    // Atualizar o nome de usuário no banco de dados
    $update_usuario_sql = "UPDATE usuarios SET usuario = '$novo_usuario' WHERE id = '$user_id'";
    
    if (mysqli_query($conn, $update_usuario_sql)) {
        $mensagem_usuario = "Nome de usuário atualizado com sucesso!";
        $usuario_alterado = true; // Para exibir o modal de sucesso
    } else {
        $mensagem_usuario = "Erro ao atualizar o nome de usuário: " . mysqli_error($conn);
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
    <link rel="stylesheet" href="../css/dashboard.css?v=1.9">
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
        <img src="../img/logo_sec.png" class="bx bxs-smile"  alt="">
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
                <a href="formulario.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Formulário</span>
                </a>
            </li>
            
           
        </ul>
        <ul class="side-menu">
            <li class="active">
                <a href="config.php">
                    <i class='bx bxs-cog' ></i>
                    <span class="text">Configurações</span>
                </a>
            </li>
            <li>
                <a href="../logout.php" class="logout">
                    <i class='bx bxs-log-out-circle' ></i>
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
            <i class='bx bx-menu' ></i>
            <a href="#" class="nav-link">Menu</a>
            <form action="#">
                <div class="form-input">
                    <input type="search" placeholder="Search...">
                    <button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
                </div>
            </form>
            <div class="profile">
				<img id="profilePic" src="uploads/<?php echo $user['foto_perfil'];?>" alt="Foto de perfil" onclick="toggleProfileMenu()">
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
                        <li><i class='bx bx-chevron-right' ></i></li>
                        <li>
                            <a class="active" href="#">Configurações</a>
                        </li>
                        <li>
                            <p>Veja e edite suas informações.</p>
                        </li>
                    </ul>
                </div>
            </div>
			<hr>
			<br>

            <div class="head-title">
                <div class="left">
                    <h1>Configurações da Conta</h1>
                </div>
            </div>

            <section class="account-info">
                <ul>
                    <li>
                        <span><b>Nome:</b></span>
                        <span><?php echo $user['nome']; ?></span>
                    </li>
                    <li>
                        <span><b>Usuário:</b></span>
                        <span><?php echo $user['usuario']; ?></span>
                        <button class="btn-usuario" onclick="abrirModalUsuario('usuario')">✏️</button>
                    </li>
                    <li>
                        <span><b>Telefone:</b></span>
                        <span><?php echo $user['telefone']; ?></span>
                    </li>
                    <li>
					<span><b>Data de Nascimento:</b> </span>
					<span><?php echo $user['data_nascimento']; ?></span>
                    </li>
                    <li>
					<span><b>Sexo:</b> </span>
					<span><?php echo $user['genero']; ?></span>
                    </li>

                    <li>
            <span><b>Foto de Perfil:</b></span><br>
            <!-- Exibir a foto de perfil atual -->
            <img src="uploads/<?php echo $user['foto_perfil']; ?>" alt="Foto de Perfil" width="100px" height="100px"><br>

            <!-- Formulário para alterar a foto de perfil -->
            <form action="atualizar_foto_perfil.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="foto_perfil" accept="image/*" required>
                <button type="submit" class="btn btn-primary">Alterar Foto</button>
            </form>
        </li>
					
                    <li>
                        <span><b>Senha:</b> </span>
                        <span>******</span> <!-- Esconder a senha -->
                        <button class="btn-senha" onclick="abrirModalSenha()">✏️</button>
                    </li>

                </ul>

                <!-- Modal para editar a senha -->
                <div id="modalSenha" style="display:none;">
                    <h3>Alterar Senha</h3>
                    <form method="POST">
                        <label for="senha_atual">Senha Atual:</label>
                        <input type="password" name="senha_atual" id="senha_atual" required>

                        <label for="nova_senha">Nova Senha:</label>
                        <input type="password" name="nova_senha" id="nova_senha" required>

                        <label for="confirmar_senha">Confirmar Nova Senha:</label>
                        <input type="password" name="confirmar_senha" id="confirmar_senha" required>

                        <input type="submit" name="salvar_senha" value="Salvar Senha">
                    </form>
                    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
                </div>

				  <!-- Modal de Sucesso da senha -->
				  <?php if ($senha_alterada): ?>
                <div id="modalSucesso" style="display:block; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color:white; color: black; text-align: center; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); z-index: 1000;"">
                    <h2>Senha Alterada com Sucesso!</h2>
                    <button onclick="fecharModal()">Fechar</button>
                </div>
                <?php endif; ?>

				<!-- Modal para editar usuario -->
                <div id="modalUsuario" style="display:none;">
                    <h3>Alterar Usuário</h3>
                    <form method="POST">
                        <label for="novo_usuario">Novo usuário:</label>
                        <input type="text" name="novo_usuario" id="novo_usuario" required>
                        <input type="submit" name="salvar_usuario" value="Salvar Usuário">
                    </form>
                    <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
                </div>

				<!-- Modal de Sucesso para Alterar Usuário -->
				<?php if (isset($usuario_alterado) && $usuario_alterado): ?>
				<div id="modalSucessoUsuario" style="display:block; position:fixed; top:50%; left:50%; transform:translate(-50%, -50%); background-color:white; color: black; text-align: center; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5); z-index: 1000;">
    				<h2>Nome de Usuário Alterado com Sucesso!</h2>
    				<button onclick="fecharModalUsuario()">Fechar</button>
				</div>
				<?php endif; ?>

               
<!-- Modal de Sucesso -->
<?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == 1): ?>
    <div id="modalSucesso" class="modal" style="display: block;">
        <div class="modal-content">
            <span class="close" onclick="fecharModal()">&times;</span>
            <h2>Foto de Perfil Alterada com Sucesso!</h2>
            <p>Sua foto de perfil foi atualizada.</p>
        </div>
    </div>
<?php endif; ?>

<!-- Estilo do modal -->
<style>
    .modal {
        display: none;
        position: absolute;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 300px;
        text-align: center;
        border-radius: 10px;
    }

    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }
</style>

<!-- Script para fechar o modal -->
<script>
    function fecharModal() {
        document.getElementById('modalSucesso').style.display = 'none';
        // Limpar a URL removendo o parâmetro 'sucesso' da barra de endereços
        const url = new URL(window.location.href);
        url.searchParams.delete('sucesso');
        window.history.replaceState({}, document.title, url);
    }

    // Fechar modal ao clicar fora dele
    window.onclick = function(event) {
        const modal = document.getElementById('modalSucesso');
        if (event.target === modal) {
            fecharModal();
        }
    };
</script>


                <!-- Botão para apagar a conta -->
                <button class="delete-account" onclick="confirmDelete()">Apagar Conta</button>
            </section>
        </main>

        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    
    <script src="../script.js"></script>
    <script>
    // Função para abrir o modal de usuário
function abrirModalUsuario() {
    document.getElementById('modalUsuario').style.display = 'block';
}

// Função para fechar o modal de sucesso de usuário
function fecharModalUsuario() {
    document.getElementById('modalSucessoUsuario').style.display = 'none';
}
	
	// Função para fechar o modal de sucesso da senha
	
        function fecharModal() {
            document.getElementById('modalSucesso').style.display = 'none';
        }

        // Função para abrir o modal de senha
        function abrirModalSenha() {
            document.getElementById('modalSenha').style.display = 'block';
        }

        // Função para confirmar a exclusão da conta
        function confirmDelete() {
            if (confirm('Tem certeza de que deseja apagar sua conta?')) {
                // Redirecionar para a página de exclusão da conta
                window.location.href = 'delete_account.php';
            }
        }
    </script>

    <script>
		// Função para exibir/esconder o menu de perfil
		function toggleProfileMenu() {
			var menu = document.getElementById('profileMenu');
			menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
		}

		// Fechar o menu de perfil ao clicar fora dele
		window.onclick = function(event) {
			if (!event.target.matches('#profilePic')) {
				var menu = document.getElementById('profileMenu');
				if (menu.style.display === 'block') {
					menu.style.display = 'none';
				}
			}
		}
	</script>

<script>
   document.querySelector('.bx-menu').addEventListener('click', function() {
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
