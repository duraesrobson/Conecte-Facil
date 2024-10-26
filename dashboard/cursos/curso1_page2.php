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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/ylmBwtqHD10?si=kQHNeHN35OlReluF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 1: Introdução ao Computador e Dispositivos</h1>
        <p>Bem-vindos à nossa aula sobre os principais componentes de um computador! Vamos aprender juntos de forma simples e prática.</p>
        
        <div class="custom-content-section">
            <h3 class="custom-title">1. O que há dentro de um computador?</h3>
            
        <p>Dentro do computador, temos várias peças que trabalham juntas para ele funcionar. Vou explicar os principais componentes:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Placa-mãe:</span>
                <span class="custom-component-description">É o coração do computador. Ela conecta todas as outras peças e faz com que elas conversem entre si.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Processador:</span>
                <span class="custom-component-description">É o cérebro do computador. Ele faz todos os cálculos e processa as informações para que você consiga ver e usar tudo o que precisa, como abrir fotos, vídeos e programas.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Memória RAM:</span>
                <span class="custom-component-description">Ajuda o processador a guardar informações temporárias enquanto o computador está funcionando. Quanto mais memória RAM, mais rápido ele pode realizar tarefas.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">HD (Disco Rígido)<p>ou SSD:</p></span>
                <span class="custom-component-description">Esses são os locais onde seus arquivos, fotos, vídeos e programas ficam armazenados. O SSD é mais rápido que o HD.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Fonte de Energia:</span>
                <span class="custom-component-description">Ela transforma a eletricidade da tomada em energia que o computador pode usar. Sem ela, o computador não funciona.</span>
            </li>
        </ul>
    </div>
            
    
            <div class="custom-content-section">
            <h3 class="custom-title">2. O que são periféricos?</h3>
            
        
            <p>Os periféricos são todos os aparelhos externos que conectamos ao computador. Aqui estão os mais comuns:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Mouse:</span>
                <span class="custom-component-description">Serve para clicar e mover o cursor na tela. Ele tem dois botões: o esquerdo, usado para selecionar coisas, e o direito, que abre opções.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Teclado:</span>
                <span class="custom-component-description">Você usa o teclado para digitar textos e comandos no computador. As letras, números e símbolos estão organizados em botões.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Monitor:</span>
                <span class="custom-component-description">É a tela onde você vê tudo o que está acontecendo no computador.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Impressora:</span>
                <span class="custom-component-description">Permite que você imprima documentos ou fotos. Algumas impressoras também têm um scanner, que copia documentos e os coloca no computador.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Caixas de som e <p>fones de ouvido:</p></span>
                <span class="custom-component-description">Servem para você ouvir música, vídeos ou sons. Os fones são úteis para ouvir sem incomodar outras pessoas.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Microfone:</span>
                <span class="custom-component-description">Pode ser usado para conversar com outras pessoas em chamadas de vídeo ou gravar áudios.</span>
            </li>
        </ul>
    </div>

    <div class="custom-content-section">

    <h3 class="custom-title">3. Armazenamento Externo</h3>
        <p>Além do HD ou SSD que está dentro do computador, você pode armazenar informações em dispositivos externos, como:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Pen drives:</span>
                <span class="custom-component-description">Pequenos e portáteis, eles servem para guardar arquivos, fotos ou vídeos e podem ser conectados a qualquer computador para transferir dados.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Cartões de <p>memória:</p></span>
                <span class="custom-component-description">Usados principalmente em celulares e câmeras, mas também podem ser inseridos no computador para transferir dados.</span>
            </li>
        </ul>
    </div>

    <div class="custom-content-section">
        <h3 class="custom-title">4. Sistemas Operacionais</h3>
        <p>O sistema operacional é o programa que faz tudo funcionar no computador. Existem vários tipos, mas aqui estão os mais comuns:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Windows:</span>
                <span class="custom-component-description">É o sistema mais popular e fácil de usar. Tem versões como Windows 7, 8, 10 e 11.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Linux:</span>
                <span class="custom-component-description">Menos usado, mas é muito seguro. É ótimo para quem quer evitar vírus.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">macOS:</span>
                <span class="custom-component-description">Sistema dos computadores da Apple, conhecido por ser bonito e fácil de usar.</span>
            </li>
        </ul>
    </div>

    
    <div class="custom-content-section">
        <h3 class="custom-title">5. Navegadores da Internet</h3>
        <p>Para acessar a internet, usamos programas chamados navegadores. Alguns dos mais comuns são:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Google Chrome:</span>
                <span class="custom-component-description">Muito rápido e popular.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Mozilla Firefox:</span>
                <span class="custom-component-description">Seguro e fácil de usar.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Microsoft Edge:</span>
                <span class="custom-component-description">Vem instalado com o Windows e é bom para navegação.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Safari:</span>
                <span class="custom-component-description">Usado em computadores da Apple.</span>
            </li>
        </ul>
    </div>

    <div class="custom-content-section">
        <h3 class="custom-title">6. A área de trabalho do Windows</h3>
        <p>A área de trabalho é o que você vê na tela quando liga o computador. Vamos entender algumas partes importantes:</p>
        <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Menu Iniciar:</span>
                <span class="custom-component-description">Fica no canto inferior esquerdo. É aqui que você encontra todos os programas do computador.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Ícones:</span>
                <span class="custom-component-description">São pequenos símbolos que representam os programas. Quando você clica neles, o programa abre.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Barra de Tarefas:</span>
                <span class="custom-component-description">Fica na parte de baixo da tela e mostra quais programas estão abertos.</span>
            </li>
        </ul>
    </div>    
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Agora que você conhece os componentes e periféricos do computador, fica mais fácil entender como tudo funciona e seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1.php">1</a> <!-- Página ativa -->
            <a href="curso1_page2.php"class="active">2</a>
            <a href="curso1_page3.php">3</a>
            <a href="curso1_page4.php">4</a>
            <a href="curso1_page5.php">5</a>
            <a href="curso1_page6.php">></a> <!-- Botão "próximo" -->
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
