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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/MfLT6WHQ0GQ?si=hZvn76-tATWkLiaH" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 1: Introdução ao Android?</h1>
        <p>Bem-vindos à nossa aula sobre os principais componentes de um computador! Vamos aprender juntos de forma simples e prática.</p>
        
        <div class="custom-content-section">
            <h3 class="custom-title">1. O que é o Sistema Android?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">O Android é o sistema operacional mais comum em smartphones, utilizado por marcas como Samsung, Motorola e LG. Ele funciona como o ambiente de trabalho do aparelho, permitindo o uso de aplicativos para realizar tarefas diárias, como fazer ligações, acessar a internet e utilizar redes sociais.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">2. Principais Botões do Aparelho</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Botão de Ligar/Desligar:</b> Serve para desligar o aparelho ou apenas a tela. Exemplo: após uma ligação, toque nele para apagar a tela.</li>
            <li class="custom-item"><b>Botão de Volume:</b> Controla o volume de músicas, vídeos e chamadas. Pressionar para cima aumenta o volume e, para baixo, diminui.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">3. Navegação no Android</h3>
            <p>O sistema Android possui três botões principais para navegação:</p>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Seta para Esquerda:</b> Retorna à tela anterior. Exemplo: Se você abriu uma foto enquanto ouvia música, basta clicar na seta para voltar à música.</li>
            <li class="custom-item"><b>Botão Home (Bolinha Central):</b> Leva você de volta à tela principal do aparelho.</li>
            <li class="custom-item"><b>Retângulo:</b> Exibe todos os aplicativos abertos, permitindo que você feche os que não está mais usando.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">4. Câmeras do Aparelho</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Câmera Traseira:</b> Fica na parte de trás do telefone e é usada para tirar fotos e gravar vídeos.</li>
            <li class="custom-item"><b>Câmera Frontal:</b> Fica na frente do telefone, utilizada principalmente para selfies e videoconferências.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">5. Conexões Importantes</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Entrada de Fone de Ouvido e Conector do Carregador:</b> Ficam na parte inferior do telefone e são essenciais para uso dos fones e carregamento. Cuidado ao conectar para evitar danos.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">6. Aplicativo de Telefone</h3>
            <p>Para fazer ligações, você deve:</p>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Abrir o app de telefone (ícone verde).</li>
            <li class="custom-item"><b>2:</b> Digitar o número no teclado e clicar no botão verde para fazer a chamada.</li>
            <li class="custom-item"><b>3:</b> Para encerrar, toque no botão vermelho.</li>
            </ol>
            
            </div>
            
    
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Você agora conhece os principais recursos do sistema Android, como botões de navegação, câmeras e o aplicativo de telefone. Pratique esses conceitos para usar seu smartphone com mais facilidade.
        <br>
        <br>
        Você já pode seguir para o próximo módulo!</p>
        
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso2.php">1</a> <!-- Página ativa -->
            <a href="curso2_page2.php"class="active">2</a>
            <a href="curso2_page3.php">3</a>
            <a href="curso2_page4.php">4</a>
            <a href="curso2_page5.php">5</a>
            <a href="curso2_page6.php">></a> <!-- Botão "próximo" -->
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
