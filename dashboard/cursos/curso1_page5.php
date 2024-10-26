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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/0lhffMgEkd4?si=zi93o_1Akbl-ak2t" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 4: Acessando a Internet</h1>
        <p>Esse módulo fala sobre como usar navegadores e motores de busca na internet, abordando suas funções e a importância de adotar boas práticas de segurança online. A seguir, explico as principais ideias de forma organizada.</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">1. Navegadores da Web</h3>
            <h3 class="custom-title2">O que são navegadores e quais os principais?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Navegadores são programas que permitem acessar a internet, abrindo páginas de sites. Os mais usados são Google Chrome, Safari, Internet Explorer e Mozilla Firefox. Cada um oferece diferentes funcionalidades, mas todos possibilitam acessar a mesma rede mundial de sites. Exemplo: Ao digitar "www.google.com" na barra de endereços de qualquer navegador, você acessa o site de buscas do Google.</li>
            <p><b>Exemplo:</b> Se você tem uma pasta chamada "Curso Básico" e dentro dela várias outras pastas, ao excluir "Curso Básico", tudo o que está dentro dela será removido.</p>  
        </ol>
            
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">2. Segurança dos Navegadores</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">A segurança ao navegar é um ponto essencial. Navegadores como o Mozilla Firefox são mais recomendados por serem seguros e menos propensos a vírus. Também é importante manter o navegador atualizado, pois as versões novas corrigem falhas de segurança que poderiam ser exploradas por hackers.</li>
            <b>Dica:</b> Evite baixar arquivos de sites desconhecidos ou clicar em anúncios suspeitos, pois esses podem conter malwares ou vírus</p>  
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Motores de Busca</h3>
            <h3 class="custom-title2">O que são e como funcionam?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Motores de busca, como o Google, são ferramentas que ajudam a encontrar sites ou informações específicas na internet. Basta digitar palavras relacionadas ao que você procura, e eles retornam uma lista de resultados. Além do Google, outros exemplos incluem Bing e Yahoo. Se preferir uma navegação mais privada, o DuckDuckGo é uma boa alternativa, pois não rastreia as suas atividades.</li>
            <p><b>Exemplo:</b> Se você quiser receitas de bolo, basta digitar “receita de bolo simples” em um motor de busca e ele trará várias opções.</p> 
        </ol>
        </div>

        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Ao seguir essas dicas, você poderá navegar com mais confiança, evitando problemas de segurança e encontrando informações de forma mais rápida. 
            <br>
            <br>
            Você já pode seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1_page2.php">2</a>
            <a href="curso1_page3.php">3</a>
            <a href="curso1_page4.php">4</a>
            <a href="curso1_page5.php"class="active">5</a>
            <a href="curso1_page6.php">6</a>
            <a href="curso1_page7.php">></a> <!-- Botão "próximo" -->
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
