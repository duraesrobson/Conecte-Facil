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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/fZvY4kCr67I?si=7uS0Ok6XPLsF56Ew" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 2: Gerenciando Arquivos</h1>
        <p>Vamos aprender sobre como copiar, criar, colar e renomear arquivos no computador. Essas ações são essenciais para organizar melhor seus documentos e garantir que você possa gerenciar seus arquivos de maneira eficiente.</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">1. Usando o Mouse e Teclado</h3>
            <p>O mouse possui dois botões principais: o esquerdo e o direito. O botão esquerdo é o mais utilizado para selecionar e abrir itens, enquanto o direito exibe um menu com várias opções úteis. Já no teclado, as teclas Ctrl, C, V, X e Delete são atalhos importantes para copiar, colar, cortar e excluir arquivos.</p>

            <div class="custom-content-section">
            <h3 class="custom-title">2. Criar uma pasta ou arquivo</h3>
            <ol class="custom-list">
            <li class="custom-item">Vá até a área de trabalho (ou qualquer pasta).</li>
            <li class="custom-item">Clique com o botão direito do mouse em qualquer lugar vazio.</li>
            <li class="custom-item">No menu que aparece, vá até a opção "Novo".</li>
            <li class="custom-item">Selecione "Pasta" ou o tipo de arquivo que deseja criar (documento de texto, por exemplo).</li>
            <li class="custom-item">Dê um nome para a pasta ou arquivo.</li>
            <li class="custom-item custom-component-description">Dica: Para renomear na hora da criação, apenas digite o nome desejado e pressione Enter.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Renomear um arquivo ou pasta</h3>
            <ol class="custom-list">
            <li class="custom-item">Clique com o botão direito do mouse sobre o arquivo ou pasta que deseja renomear.</li>
            <li class="custom-item">No menu, clique em "Renomear".</li>
            <li class="custom-item">O nome atual do arquivo será selecionado. Digite o novo nome e pressione Enter.</li>
            <li class="custom-item custom-component-description">Atalho: Selecione o arquivo ou pasta e pressione a tecla F2 para renomear diretamente.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">4. Copiar e colar um arquivo</h3>
            <h3 class="custom-title">Copiar:</h3>
            <ol class="custom-list">
            <li class="custom-item">Clique com o botão direito do mouse no arquivo ou pasta que deseja copiar.</li>
            <li class="custom-item">Selecione "Copiar" no menu que aparece.</li>
        </ol>
        <h3 class="custom-title">Colar:</h3>
        <ol class="custom-list">
            <li class="custom-item">Vá até o local onde deseja colar o arquivo (ou pasta).</li>
            <li class="custom-item">Clique com o botão direito do mouse em um espaço vazio.</li>
            <li class="custom-item">Selecione "Colar".</li>
            <li class="custom-item custom-component-description">Atalho: Use o Ctrl + C para copiar e o Ctrl + V para colar. Isso agiliza o processo.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">5. Recortar e mover um arquivo ou pasta</h3>
            <h3 class="custom-title">Recortar:</h3>
            <ol class="custom-list">
            <li class="custom-item">Clique com o botão direito do mouse no arquivo ou pasta que deseja mover.</li>
            <li class="custom-item">Selecione "Recortar".</li>
        </ol>
        <h3 class="custom-title">Mover:</h3>
        <ol class="custom-list">
            <li class="custom-item">Vá até o local onde deseja mover o arquivo.</li>
            <li class="custom-item">Clique com o botão direito do mouse e selecione "Colar".</li>
            <li class="custom-item custom-component-description">Atalho: Use Ctrl + X para recortar e Ctrl + V para colar.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">6. Excluir um arquivo ou pasta</h3>
            <h3 class="custom-title">Excluir:</h3>
            <ol class="custom-list">
            <li class="custom-item">Clique com o botão direito do mouse no arquivo ou pasta que deseja excluir.</li>
            <li class="custom-item">Selecione "Excluir".</li>
            <li class="custom-item">Confirme a exclusão quando solicitado.</li>
            <li class="custom-item custom-component-description">Atalho: Selecione o arquivo e pressione a tecla Delete do seu teclado. O arquivo irá para a lixeira.</li>
        </ol>
        <h3 class="custom-title">Recuperar da Lixeira:</h3>
        <ol class="custom-list">
            <li class="custom-item">Abra a lixeira clicando duas vezes nela.</li>
            <li class="custom-item">Encontre o arquivo que deseja restaurar.</li>
            <li class="custom-item">Clique com o botão direito no arquivo e selecione "Restaurar".</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">7. Teclas de atalho úteis</h3>
            <p>Teclas de atalho são combinações de teclas que permitem realizar rapidamente determinadas ações no computador, como copiar, colar, recortar ou desfazer uma ação. Elas economizam tempo, evitando que você precise navegar por menus e cliques, tornando o uso do sistema mais eficiente.</p>

            
            <ul class="custom-list">
            <li class="custom-item">
                <span class="custom-component-title">Ctrl + C:</span>
                <span class="custom-component-description">Copiar.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Ctrl + V:</span>
                <span class="custom-component-description">Colar</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Ctrl + X:</span>
                <span class="custom-component-description">Recortar.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">F2:</span>
                <span class="custom-component-description">Renomear.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Delete:</span>
                <span class="custom-component-description">Excluir.</span>
            </li>
            <li class="custom-item">
                <span class="custom-component-title">Ctrl + Z:</span>
                <span class="custom-component-description">Desfazer a última ação.</span>
            </li>
            
        </ul>
        </div>
        
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Esses passos são essenciais para organizar arquivos e pastas no computador e economizar tempo com o uso de teclas de atalho! Você ja está pronto para seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1.php">1</a> <!-- Página ativa -->
            <a href="curso1_page2.php">2</a>
            <a href="curso1_page3.php"class="active">3</a>
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
