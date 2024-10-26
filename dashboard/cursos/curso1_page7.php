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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/c1oXK-bgZKE?si=2leYUnIKrSNeFx-5" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 6: Assistindo a Vídeos no YouTube</h1>
        <p>Neste módulo, Nesta aula, você aprenderá a utilizar o YouTube, uma plataforma essencial para acessar conteúdos em vídeo, como tutoriais, filmes e documentários. O YouTube é uma ferramenta de entretenimento e educação que permite visualizar e compartilhar vídeos gratuitamente.</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">1. Introdução à navegação e uso básico do YouTube</h3>
            <h3 class="custom-title2">O que é o YouTube?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">O YouTube é uma plataforma de vídeos online onde você pode assistir, compartilhar e interagir com uma grande variedade de conteúdos, como filmes, tutoriais, música, notícias e muito mais.</li>
        </ol>
        <h3 class="custom-title2">Como acessar o YouTube?</h3>
        <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Para acessar o YouTube, você pode digitar “www.youtube.com” na barra de endereços do seu navegador. Também é possível encontrar o YouTube ao pesquisar no Google.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">2. Criando uma conta no YouTube</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">Por que criar uma conta?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Ter uma conta no YouTube permite que você salve seus vídeos favoritos, inscreva-se em canais e receba recomendações personalizadas.</li>
        </ol>
        <h3 class="custom-title2">Como criar uma conta?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Basta fazer login com uma conta do Google. Se você não tem uma, pode criar uma facilmente acessando “Criar conta” na página de login.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Usando a barra de pesquisa do YouTube</h3>
           <div class="custom-content-section">
           <h3 class="custom-title2">Como funciona a barra de pesquisa?</h3>
            <ol class="custom-list">
            <li class="custom-item">A barra de pesquisa permite que você encontre qualquer vídeo no YouTube. Basta digitar o que está procurando, como “música clássica relaxante” ou “receitas fáceis de sobremesa”.</li>
            <p><b>Dica:</b> Conforme você digita, o YouTube sugere palavras ou vídeos populares. Essas sugestões podem ajudar a encontrar o conteúdo que você deseja mais rapidamente.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">4. Assistindo vídeos e interagir com os controles de reprodução</h3>
           <div class="custom-content-section">
           <h3 class="custom-title2">Como assistir vídeos?</h3>
            <ol class="custom-list">
            <li class="custom-item">Quando encontrar um vídeo, clique sobre ele e ele começará a ser reproduzido. A tela de reprodução tem vários controles.</li>
            </ol>

            <h3 class="custom-title2">Quais são os principais controles?</h3>
            <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Play/Pause:</span>
                <span class="custom-component-description">Iniciar ou parar o vídeo.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Volume:</span>
                <span class="custom-component-description">Aumentar ou diminuir o som.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Barra de Progresso:</span>
                <span class="custom-component-description">Ver o ponto onde você está no vídeo e pular para outra parte.</span>
            </li>
            <p><b>Dica:</b> Você também pode usar a tecla espaço para pausar ou continuar o vídeo de forma rápida.</p> 

        </ul>
    </div>    
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">5. Explorando vídeos sugeridos e personalização de sugestões</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">O que são vídeos sugeridos?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">O YouTube recomenda vídeos baseados no que você já assistiu. Esses vídeos aparecem ao lado ou abaixo do vídeo que você está assistindo.</li>
        </ol>
        <h3 class="custom-title2">Por que isso é útil?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Conforme você interage com vídeos (curtindo, comentando, se inscrevendo), o YouTube personaliza ainda mais suas sugestões, facilitando encontrar conteúdo do seu interesse.</li>
            <p><b>Dica:</b> Se um vídeo sugerido não for do seu gosto, você pode clicar em “Não me interessa” para melhorar suas recomendações futuras.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">6. Configurações de qualidade e performance do vídeo
            </h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">O que é a qualidade de vídeo?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">A qualidade de vídeo é medida em resoluções, como 360p, 720p ou 1080p. Quanto maior o número, melhor a imagem, mas exige mais da internet.</li>
        </ol>
        <h3 class="custom-title2">Como ajustar a qualidade?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Clique no ícone de engrenagem no vídeo e selecione “Qualidade” para escolher. Se sua internet for lenta, escolha uma resolução menor para o vídeo não travar.</li>
            <p><b>Dica:</b> Use resoluções menores como 480p se estiver economizando dados móveis ou a conexão estiver instável.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">7. Funcionalidades adicionais: Modo Cinema, Tela Cheia e Anotações</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">O que são essas funcionalidades?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Modo Cinema:</b> O vídeo ocupa uma parte maior da tela, mas você ainda vê os vídeos sugeridos ao lado.</li>
            <li class="custom-item"><b>Tela Cheia:</b> O vídeo ocupa uma parte maior da tela, mas você ainda vê os vídeos sugeridos ao lado.</li>
            <li class="custom-item"><b>Anotações:</b> São mensagens que aparecem no vídeo e podem ser desativadas.</li>
            <p><b>Dica:</b> Para entrar no modo Tela Cheia, pressione a tecla F no teclado.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">8. Interagindo com vídeos: Curtir, Compartilhar e Inscrever-se em canais</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">Como interagir com vídeos?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Curtir/Não curtir:</b> Mostre se você gostou ou não do vídeo.</li>
            <li class="custom-item"><b>Compartilhar:</b> Envie o vídeo para amigos através de redes sociais ou por e-mail.</li>
            <li class="custom-item"><b>Inscrever-se:</b> Ao se inscrever em um canal, você recebe notificações sempre que novos vídeos forem postados.</li>
            <p><b>Dica:</b> Se você gosta de um canal específico, inscreva-se para não perder novos conteúdos.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">9. Área de comentários e descrição dos vídeos</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">O que é a área de comentários?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Abaixo de cada vídeo, há uma seção onde os usuários podem comentar. Você pode ler comentários de outros ou deixar sua opinião.</li>
        </ol>
        <h3 class="custom-title2">O que é a descrição do vídeo?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">A descrição é escrita pelo criador do vídeo e pode conter mais informações, como links, créditos ou detalhes adicionais.</li>
            <p><b>Dica:</b> Verifique sempre a descrição para links úteis ou informações extras sobre o vídeo.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">10. Explorando o histórico e organizando vídeos favoritos</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">Como acessar o histórico?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">No menu lateral, clique em “Histórico” para ver os vídeos que você já assistiu. Isso facilita retomar vídeos que você gostou.</li>
            <p><b>Dica:</b> Se preferir manter privacidade, é possível apagar ou pausar o histórico de visualizações a qualquer momento.</p> 
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">11. Notificações e controle de histórico</h3>
            <div class="custom-content-section">
            <h3 class="custom-title2">O que são as notificações?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Quando você se inscreve em um canal, pode ativar notificações para saber sempre que um novo vídeo for postado.</li>
        </ol>
        <h3 class="custom-title2">Como gerenciar o histórico?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Vá até a seção de configurações para controlar se o YouTube salva seu histórico de visualizações ou pesquisas. Você também pode apagar todo o histórico quando desejar.</li>
        </ol>
        </div>

       
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Agora que você sabe como navegar, interagir e ajustar suas preferências no YouTube, pode usá-lo para encontrar e aproveitar conteúdos que mais gosta. 
            <br>
            <br>
            Você já pode seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="curso1_page6.php"><</a> <!-- Botão "anterior" -->
            <a href="curso1_page4.php">4</a>
            <a href="curso1_page5.php">5</a>
            <a href="curso1_page6.php">6</a>
            <a href="curso1_page7.php"class="active">7</a>
            <a href="curso1_page8.php">8</a>
            <a href="curso1_page8.php">></a> <!-- Botão "próximo" -->
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
