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
                            <p>Introdução ao Uso do Computador e Dispositivos Móveis</p>
                        </li>
                    </ul>
                </div>
            </div>

            <hr>

           
    <div class="custom-container">

    <div class="video-container">
     <div class="video-container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/FgvcJdDDB6M?si=0bkOHfBDle1tMbDW" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>
        </div>    

        <h1 class="custom-header">Parte 8: Dominando o Computador</h1>
        <p>Neste conteúdo didático, cobrimos os aspectos fundamentais para você utilizar o computador de maneira eficiente, começando pelo básico e evoluindo para tarefas práticas. Aqui está um resumo detalhado do que foi aprendido:</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">O que você aprendeu com esse conteúdo:</h3>
            <p>O conteúdo fornecido é a base essencial para você usar o computador de forma eficaz no cotidiano. Você agora tem os conhecimentos necessários para explorar a internet, organizar arquivos e realizar atividades simples, como buscar informações e utilizar o YouTube.</p>
            <h3 class="custom-title">1. Introdução ao Computador e Dispositivos</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Componentes do Computador:</b> Aprendemos sobre as principais partes de um computador, como monitor, teclado, mouse, CPU e impressoras.</li>
            <li class="custom-item"><b>Dispositivos de Entrada e Saída:</b> Exploramos a função de dispositivos como o teclado (entrada) e o monitor (saída), além de entender como esses dispositivos se comunicam com o computador.</li>
            <li class="custom-item"><b>Cuidados com o Equipamento:</b> Abordamos dicas de como cuidar bem do computador, incluindo limpeza básica e o uso de acessórios de proteção.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">2. Navegação no Windows</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Introdução ao Sistema Operacional:</b> Aprendemos a navegar pelo Windows, entendendo sua interface, principais funções e como acessar programas e arquivos.</li>
            <li class="custom-item"><b>Explorador de Arquivos:</b> Descobrimos como usar o Explorador de Arquivos para localizar, abrir e gerenciar documentos e pastas no computador.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Gerenciamento de Arquivos</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Organização de Pastas e Arquivos:</b> Exploramos como criar, renomear, mover e excluir arquivos e pastas, permitindo que você mantenha suas informações organizadas.</li>
            <li class="custom-item"><b>Copiar e Colar:</b> Dominamos o uso do "Copiar" e "Colar", ferramentas essenciais para mover conteúdo e arquivos de forma rápida e eficiente.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">4. Internet e Navegação Online</h3>
            <div class="custom-content-section">
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Navegadores de Internet:</b> Aprendemos a usar navegadores como Google Chrome para acessar sites, fazer pesquisas e navegar com segurança. </li>
            <li class="custom-item"><b>Uso de E-mail:</b> Exploramos como criar, enviar e gerenciar e-mails, além de usar anexos e organizar a caixa de entrada.</li>
            </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">5. Assistir a Vídeos no YouTube</h3>
            <div class="custom-content-section">
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Navegação no YouTube:</b> Aprendemos a procurar vídeos, assistir conteúdos educativos e de entretenimento, e salvar favoritos para acesso rápido.</li>
            <li class="custom-item"><b>Configurações de Vídeo:</b> Exploramos funções como ajustar a qualidade dos vídeos, ativar legendas e compartilhar conteúdos.</li>
             </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">6. Digitação e Prática no Teclado</h3>
            <div class="custom-content-section">
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Navegação no YouTube:</b> Aprendemos a procurar vídeos, assistir conteúdos educativos e de entretenimento, e salvar favoritos para acesso rápido.</li>
            <li class="custom-item"><b>Configurações de Vídeo:</b> Exploramos funções como ajustar a qualidade dos vídeos, ativar legendas e compartilhar conteúdos.</li>
            </ol>
        </div>

        

       
        <h2 class="custom-subheader">Conclusão</h2>
        <p>A partir de agora, você pode realizar tarefas cotidianas com mais facilidade, além de buscar novas formas de aprender e se desenvolver no mundo digital. 
    </p>
<br><br><br>
    <h1 class="custom-header">Obrigado, e até a próxima!</h1>

    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="curso1_page7.php"><</a> <!-- Botão "anterior" -->
            <a href="curso1_page5.php">5</a>
            <a href="curso1_page6.php">6</a>
            <a href="curso1_page7.php">7</a>
            <a href="curso1_page8.php"class="active">8</a>
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
