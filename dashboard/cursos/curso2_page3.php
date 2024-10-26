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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/XGW_BuphW3g?si=4NFod6NFSPC68Q0g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 2: Aplicativo de Contatos</h1>
        <p>Esse módulo explica como usar o aplicativo de contatos no Android para adicionar, editar e excluir contatos, além de como fazer ligações telefônicas e marcar contatos como favoritos.</p>
        
        <div class="custom-content-section">
            <h3 class="custom-title">1. Localizando o Aplicativo Contatos</h3>
            <p>Para usar o aplicativo de contatos no Android:</p>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Encontre o aplicativo na tela principal.</li>
            <li class="custom-item"><b>2:</b> Caso não esteja visível, deslize para a esquerda ou clique no ícone de aplicativos no canto inferior direito.</li>
            <li class="custom-item"><b>3:</b> Se necessário, pesquise pelo nome "Contatos" na lista de aplicativos.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">2. Criando um Novo Contato</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Abra o aplicativo "Contatos".</li>
            <li class="custom-item"><b>2:</b> Clique no sinal de "mais" (+) no canto inferior direito para adicionar um novo contato.</li>
            <li class="custom-item"><b>3:</b> Preencha os campos com:
            <ol class="custom-list">
            <li class="custom-list">
            <li class="custom-item"> Nome e sobrenome (ex.: João Silva).
            <li class="custom-item"> Número de telefone (ex.: 7777-8888), podendo definir se é celular, comercial ou residencial.
            <li class="custom-item"> E-mail e outros detalhes adicionais, se necessário.
            </li>
            </ol>
            <li class="custom-item"><b>4:</b> Preencha os campos com:Clique em "Salvar" para finalizar.
        </li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">3. Editando um Contato</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Para modificar um contato já salvo, clique sobre o nome do contato.</li>
            <li class="custom-item"><b>2:</b> Clique no ícone de lápis para "Editar contato".</li>
            <li class="custom-item"><b>3:</b> Altere as informações desejadas, como nome, sobrenome, telefone, etc.</li>
            <li class="custom-item"><b>4:</b> Após as alterações, clique em "Salvar".</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">4. Excluindo um Contato</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Selecione o contato que deseja remover.</li>
            <li class="custom-item"><b>2:</b> Clique nos três pontinhos no canto superior direito.</li>
            <li class="custom-item"><b>3:</b> Escolha a opção "Excluir" e confirme para remover o contato.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">5. Marcando Contatos como Favoritos</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Abra o contato que deseja marcar como favorito.</li>
            <li class="custom-item"><b>2:</b> Clique na estrela no canto superior direito.</li>
            <li class="custom-item"><b>3:</b> O contato será exibido como favorito e destacado na lista de contatos.</li>
            </ol>
            </div>

            <div class="custom-content-section">
            <h3 class="custom-title">6. Fazendo Ligações</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>1:</b> Selecione o contato desejado.</li>
            <li class="custom-item"><b>2:</b> Clique no botão "Ligar" para iniciar uma chamada diretamente pelo aplicativo.</li>
            </ol>
            
            </div>
            
    
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>O aplicativo de contatos do Android facilita a organização dos seus números de telefone, oferecendo recursos para adicionar, editar e excluir contatos, além de gerenciar favoritos e realizar chamadas.
        <br>
        <br>
        Você já pode seguir para o próximo módulo!</p>
        
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="curso2_page2.php"><</a> <!-- Botão "anterior" -->
            <a href="curso2.php">1</a> <!-- Página ativa -->
            <a href="curso2_page2.php">2</a>
            <a href="curso2_page3.php"class="active">3</a>
            <a href="curso2_page4.php">4</a>
            <a href="curso2_page5.php">5</a>
            <a href="curso2_page4.php">></a> <!-- Botão "próximo" -->
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
