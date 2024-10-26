<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado, caso contrário, redirecionar para login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
include('../../db.php');

// Obter o ID do usuário logado
$user_id = $_SESSION['user_id'];

// Buscar informações do usuário
$query = "SELECT nome, foto_perfil FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="../../css/dashboard.css?v=1.7">
    <!--favicons -->
 <link rel="shortcut icon" href="../../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../../img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../../img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../../img/favicon/favicon-16x16.png">
    <title>Conecte Fácil</title>
</head>
<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
        <img src="../../img/logo_sec.png" class="bx bxs-smile"  alt="">
        </a>
        <ul class="side-menu top">
        <li>
                <a href="../inicio.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Início</span>
                </a>
            </li>
            <li class="active">
                <a href="../meus_cursos.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Meus Conteúdos</span>
                </a>
            </li>
            
            <li >
                <a href="../formulario.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Formulário</span>
                </a>
            </li>
            
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../config.php">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Configurações</span>
                </a>
            </li>
            <li>
                <a href="../../logout.php" class="logout">
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
            <form id="searchForm" onsubmit="return false;">
    <div class="form-input">
        <input type="search" id="searchInput" placeholder="Pesquisar cursos..." onkeypress="pesquisar(event)">
        <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
    </div>
</form>
<div id="conteudoMain"></div> <!-- O conteúdo de pesquisa será exibido aqui -->
           
                <div class="profile">
                <img id="profilePic" src="../uploads/<?php echo $user['foto_perfil']; ?>" alt="Foto de perfil" onclick="toggleProfileMenu()">
                <div id="profileMenu" class="profile-menu">
                    <ul>
                        <li><a href="../config.php">Configurações</a></li>
                        <li><a href="../../logout.php">Sair</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main id="conteudoMain">
            <div class="head-title">
                <div class="left">
                    <h1>Olá, <?php echo $user['nome']; ?>!</h1>
                    <ul class="breadcrumb">
                        <li>
                            <a href="#">Painel</a>
                        </li>
                        <li><i class='bx bx-chevron-right'></i></li>
                        <li>
                            <a class="active" href="../meus_cursos.php">Conteúdos</a>
                        </li>
                        <li>
                            <p>Usando Aplicativos Essenciais no Celular e Tablet</p>
                        </li>
                    </ul>
                </div>
            </div>

            <hr>

           
    <div class="custom-container">

    <div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/6pvZnGGQ5m8?si=wHKX63iKmwSqCmXH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 10: Arquivos na Nuvem</h1>
        <p>Aprenda a organizar seus arquivos usando o Google Drive.</p>
        <div class="custom-content-section">
            <h3 class="custom-title">1. Importância da Nuvem</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">O serviço de nuvem é um local para guardar arquivos, permitindo transferir dados de um aparelho antigo para um novo, como contatos, fotos e mensagens.</li>
            <li class="custom-item">Acesso fácil pelo computador também é uma vantagem.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">2. Google Drive</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Usaremos o Google Drive. Localize o ícone na tela inicial ou na lista de aplicativos.</li>            
            <li class="custom-item">Para transferir um arquivo, clique no sinal de "+", escolha "Fazer upload".</li>            
            </ol>
            </div>
           
            <div class="custom-content-section">
            <h3 class="custom-title">3. Transferindo Arquivos</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Selecione o Arquivo:</b> Escolha o arquivo que deseja transferir (ex: imagens).</li>            
            <li class="custom-item"><b>Upload:</b> Selecione o arquivo e clique em "Abrir". O upload começará automaticamente.</li>            
            <li class="custom-item"><b>Visualização:</b> Para mudar a visualização das fotos, clique nos seis quadrados no canto superior direito.</li>            
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">4. Alternativa: Aplicativo Fotos</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Abra o aplicativo Fotos, selecione uma imagem e clique em "Compartilhar".</li>            
            <li class="custom-item">Escolha "Salvar no Drive", atribua um nome e clique em "Salvar".</li>            
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">5. Verificação e Exclusão</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Confira se a foto foi transferida para o Google Drive.</li>            
            <li class="custom-item">Para excluir uma foto, toque e segure na imagem, e clique na lixeira.</li>            
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">6. Remoção de Arquivos do Telefone</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Se você apagar a foto do telefone, ela permanecerá na nuvem, funcionando como uma cópia de segurança.</li>            
            </ol>
            </div>

           

        </div>

        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Agora você sabe como transferir e gerenciar arquivos na nuvem!
            <br>
            <br>
            Você já pode seguir para o próximo módulo!</p>
        
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="curso2_page10.php"><</a> <!-- Botão "anterior" -->
            <a href="curso2_page9.php">9</a>
            <a href="curso2_page10.php">10</a>
            <a href="curso2_page11.php"class="active">11</a>
            <a href="curso2_page12.php">12</a>
            <a href="curso2_page12.php">13</a>
            <a href="curso2_page13.php">></a> <!-- Botão "próximo" -->
        </div>

        



        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->

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

        // Função para abrir o modal
        function openModal() {
            document.getElementById('successModal').style.display = 'block';
        }

        // Função para fechar o modal
        function closeModal() {
            document.getElementById('successModal').style.display = 'none';
        }

        // Função para inscrever em um curso
        function inscrever(cursoId) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "inscrever.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        openModal();
                    } else {
                        alert(response.message);
                    }
                }
            };
            xhr.send(JSON.stringify({ cursoId: cursoId }));
        }

        // Função para pesquisar cursos
        function pesquisar(event) {
    // Verifica se a tecla pressionada foi o Enter (código 13)
    if (event.keyCode === 13) {
        event.preventDefault(); // Prevenir o comportamento padrão do enter (submeter o formulário)

        var query = document.getElementById('searchInput').value;

        if (query.length > 0) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "pesquisa.php", true); // Usando POST para enviar os dados
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.querySelector("main").innerHTML = xhr.responseText; // Substitui o conteúdo da main
                } else if (xhr.readyState == 4) {
                    console.error("Erro na requisição AJAX. Status: " + xhr.status);
                }
            };

            xhr.send("termo=" + query);
        } else {
            document.querySelector("main").innerHTML = ""; // Limpa o conteúdo se a pesquisa estiver vazia
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

<script src="../../script.js"></script>
</body>
</html>