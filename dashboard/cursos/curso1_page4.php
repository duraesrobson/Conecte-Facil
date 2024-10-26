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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/DhNKJuh_g-A?si=jT7FlJwVxxorxJZE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 3: Navegando pelo Windows</h1>
        <p>Esse módulo fala sobre navegação de arquivos e pastas no Windows, explicando como as pastas se organizam em hierarquias e a importância de algumas pastas principais do sistema.</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">1. Hierarquia de Pastas</h3>
            <h3 class="custom-title2">O que é a hierarquia de pastas?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">As pastas no Windows seguem uma organização hierárquica, onde pastas "mãe" contêm pastas "filhas". A pasta mãe é a pasta principal que contém outras pastas e arquivos dentro dela.</li>
            <li class="custom-item">Quando você exclui ou renomeia uma pasta mãe, todas as pastas e arquivos dentro dela também são afetados. Se você excluir a pasta principal, todo o seu conteúdo será excluído também.</li>
            <p><b>Exemplo:</b> Se você tem uma pasta chamada "Curso Básico" e dentro dela várias outras pastas, ao excluir "Curso Básico", tudo o que está dentro dela será removido.</p>  
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">2. Pastas Principais do Sistema</h3>
            <p>O Windows possui algumas pastas que não devem ser apagadas, pois são essenciais para o funcionamento do sistema. Algumas delas incluem:</p>
            <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Pasta Windows:</span>
                <span class="custom-component-description">Contém arquivos e programas necessários para rodar o sistema.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Pasta Usuários<p>(Users):</p></span>
                <span class="custom-component-description">Onde ficam armazenados os arquivos pessoais, como documentos, fotos, vídeos, área de trabalho e outros arquivos do usuário.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Pasta Arquivos<p>de Programas:</p></span>
                <span class="custom-component-description">Guarda os programas instalados no sistema.</span>
            </li>
            <p><b>Exemplo:</b> Se você pesquisar por "componentes", ele vai encontrar tanto arquivos que tenham essa palavra no nome quanto arquivos que contenham a palavra "componentes" no seu conteúdo.</p> 
        </ul>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Busca de Arquivos</h3>
            <p>O Windows tem ferramentas poderosas para busca de arquivos.</p>
            <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Busca na barra<p>de pesquisa:</p></span>
                <span class="custom-component-description">Na parte superior da janela de pastas, você pode pesquisar arquivos pelo nome ou por palavras contidas no documento.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Busca no <p>Menu Iniciar:</p></span>
                <span class="custom-component-description">Outra maneira de procurar por programas e arquivos, utilizando a barra de pesquisa do menu iniciar.</span>
            </li>
        </ul>

        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">4. Atalhos de Teclado para Navegação</h3>
            <p>O Windows também facilita a navegação por meio de teclas de atalho na navegação:</p>
            <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Backspace<p>(tecla de apagar):</p></span>
                <span class="custom-component-description">Retorna para a pasta anterior.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Enter:</span>
                <span class="custom-component-description">Abre a pasta selecionada</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Home:</span>
                <span class="custom-component-description">Leva ao início da página.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">End:</span>
                <span class="custom-component-description">Leva ao final da lista de arqivos.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Page Up e <p>Page Down:</p></span>
                <span class="custom-component-description">Excluir.</span>
            </li>    
        </ul>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">4. Cuidados ao Excluir Pastas</h3>
            <p>Ao excluir uma pasta, tome cuidado, especialmente se ela contiver arquivos importantes. Quando uma pasta é removida, todo o conteúdo dentro dela também será excluído.
            <br>
            <br>
            <b>Dica importante:</b> Não exclua pastas principais do sistema (como a pasta Windows ou System32), pois isso pode causar falhas no sistema.</p>
            

        </div>
        
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Neste módulo, aprendemos sobre a hierarquia de pastas no Windows, a importância de não apagar pastas essenciais, e como utilizar a busca e atalhos para facilitar a navegação. 
            <br>
            <br>
            Você já pode seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1.php">1</a> <!-- Página ativa -->
            <a href="curso1_page2.php">2</a>
            <a href="curso1_page3.php">3</a>
            <a href="curso1_page4.php"class="active">4</a>
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
