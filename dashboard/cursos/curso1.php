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
    <h1 class="custom-header-big">Introdução ao Uso do Computador</h1>

    <div class="video-container">
    <iframe width="100" height="315" src="https://www.youtube.com/embed/Fqzlq_HtFaI?si=QwGbdKp6-A99qnhF" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Objetivo do Tema:</h1>
        <p>Todo o conteúdo deste tema <b>EM VÍDEO</b> foi desenvolvido e disponibilizado gratuitamente pelo canal do YouTube <a href="http://www.youtube.com/@Programador"><b class="blue">@Programador</b></a> (clique para acessar), para ensinar de maneira prática e didática o uso básico do computador e da internet. Com foco em promover a autonomia digital, o conteúdo é dividido em 8 partes que abordam desde os primeiros passos com o computador até o uso de redes sociais e segurança online.</p>
        
        <h2 class="custom-subheader">Conteúdo do Curso</h2>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 1: Introdução ao Uso do Computador</h2>
            <p>Nesta primeira parte, vamos apresentar os principais componentes do computador. Aprenda a ligar, desligar e usar o mouse e o teclado de forma eficaz. Exploraremos também os periféricos como pendrives, caixas de som e a organização da área de trabalho.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 2: Copiar, Criar e Renomear Arquivos</h3>
            <p>Aprenda a gerenciar seus arquivos no sistema operacional Windows. Nesta parte, você vai criar e organizar pastas e arquivos, renomeá-los e aprender a usar o mouse e teclado com mais precisão. Organize suas fotos, documentos e arquivos de maneira eficiente.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 3: Navegando pelo Windows</h3>
            <p>Descubra como funciona a estrutura de pastas do sistema operacional e aprenda a navegar entre elas. Saberemos quais pastas são importantes e o que não devemos excluir, além de como encontrar documentos perdidos com facilidade.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 4: Acessando a Internet</h3>
            <p>Entenda como funciona a navegação online. Iremos explorar navegadores como Mozilla Firefox, aprender a usar motores de busca como o Google, e entender como procurar informações e acessar sites com segurança, evitando armadilhas como vírus e golpes online.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 5: Criando e Gerenciando um E-mail</h3>
            <p>O e-mail é essencial para muitas atividades online. Nesta parte, aprenderemos a criar e gerenciar um e-mail para usá-lo em redes sociais, YouTube e outras plataformas. Iremos passo a passo criar um e-mail do zero, entender suas funções básicas e praticar.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 6: Assistindo a Vídeos no YouTube</h3>
            <p>O YouTube oferece uma infinidade de vídeos para entretenimento e aprendizado. Iremos explorar como assistir a vídeos, salvar favoritos e navegar pela plataforma de forma segura e eficiente, aproveitando ao máximo o conteúdo disponível.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 7: Introdução à Digitação</h3>
            <p>Saber digitar com eficiência facilita muitas tarefas no computador. Nesta parte, vamos ensinar as principais técnicas de digitação, com exercícios práticos para que você aprenda a digitar de maneira mais rápida e correta.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 8: Dominando o Computador</h3>
            <p>Nesta última parte, uniremos todos os conhecimentos. Você será capaz de navegar pela internet, usar redes sociais, enviar e-mails e gerenciar arquivos no computador com confiança. Ao final do curso, você terá as habilidades necessárias para usar a tecnologia no dia a dia de forma independente.</p>
        </div>
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>No final do conteúdo, o objetivo é que você se sinta à vontade usando a tecnologia, sem precisar da ajuda de netos ou familiares. As partes foram pensadas para serem simples, práticas e fáceis de seguir, garantindo que você adquira as habilidades necessárias para dominar o computador e navegar com confiança no mundo digital.</p>
    </div>
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1.php" class="active">1</a> <!-- Página ativa -->
            <a href="curso1_page2.php">2</a>
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
