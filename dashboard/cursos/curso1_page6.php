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
    <iframe width="560" height="315" src="https://www.youtube.com/embed/fgdg1q5A8aU?si=EKRLSugZQS9zBnVM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div>

        <hr>
        
        <h1 class="custom-header">Parte 5: Criando e Gerenciando um E-mail</h1>
        <p>Neste módulo, você aprenderá a criar um e-mail, uma ferramenta fundamental para a comunicação nos dias de hoje. Os e-mails são amplamente utilizados por empresas e plataformas para se comunicar com você de maneira prática e sem custos, sendo uma alternativa sustentável em relação ao uso de papel. Além disso, o e-mail é necessário para cadastrar-se em diversos sites, como YouTube, Facebook e outros serviços na internet.</p>
       
        <div class="custom-content-section">
            <h3 class="custom-title">1. O que é um E-mail?</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item">Um e-mail é um meio de comunicação eletrônico que permite o envio de mensagens, arquivos e informações para qualquer pessoa que também possua uma conta de e-mail. Ele é uma ferramenta essencial para receber comunicações, como anúncios, respostas de entrevistas de emprego, e até mensagens pessoais.</li>
            <li class="custom-item">Existem serviços gratuitos, como o Gmail, oferecido pelo Google, que são os mais comuns e práticos para o uso diário. Há também serviços pagos, utilizados principalmente por empresas que desejam ter e-mails personalizados e profissionais.</li>
        </ol>  
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">2. Criando um E-mail no Gmail</h3>
            <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Acesse o Google:</b> Abra seu navegador de internet e vá até o site do Google (www.google.com).</li>
            <li class="custom-item"><b>Digite "Gmail" na Pesquisa:</b> No campo de busca, digite "Gmail" e clique no link para acessar a página de e-mail do Google.</li>
            <li class="custom-item"><b>Criar Conta:</b> Caso você ainda não tenha um e-mail, clique em "Criar conta". Você será direcionado a uma página onde deverá preencher suas informações pessoais, como nome, sobrenome, e a escolha do seu novo endereço de e-mail.</li>
            <li class="custom-item"><b>Escolha do Nome de Usuário:</b>  É importante escolher um nome de usuário fácil de lembrar. O Google avisará caso o nome escolhido já esteja em uso, sugerindo variações.</li>
            <li class="custom-item"><b>Criando uma Senha Segura:</b> Para proteger sua conta, escolha uma senha forte, misturando letras, números e símbolos. Evite usar combinações simples, como datas de nascimento ou sequências fáceis de adivinhar.</li>
            <li class="custom-item"><b>Preencha Dados Pessoais:</b> Coloque sua data de nascimento e o gênero. Além disso, o Google solicitará um número de celular ou outro e-mail para ajudar na recuperação da sua conta, caso você perca o acesso.</li>
        </ol>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">3. Configurando e Usando o E-mail</h3>
           <p>Depois de concluir o cadastro, você será direcionado à caixa de entrada do Gmail. Algumas opções básicas que você encontrará:</p>
           <div class="custom-content-section">
            <ol class="custom-list">
            <li class="custom-item"><b>Caixa de Entrada:</b> Aqui você verá todas as mensagens recebidas. As mensagens não lidas aparecem em destaque.</li>
            <li class="custom-item"><b>Enviar E-mails:</b> Para enviar um e-mail, clique em "Escrever", insira o endereço do destinatário, o assunto e a mensagem. Depois é só clicar em "Enviar".</li>
            <li class="custom-item"><b>Organização:</b> O Gmail organiza automaticamente suas mensagens em categorias, como "Principal", "Social" e "Promoções".</li>
            <li class="custom-item"><b>Configurações de Idioma:</b>  Caso a interface esteja em outro idioma, você pode mudar facilmente acessando as configurações (ícone de engrenagem) e alterando o idioma para "Português (Brasil)".</li>
        </ol>
        </div>

        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>Além de ser uma ferramenta prática para comunicação pessoal e profissional, o e-mail é necessário para acessar diversos serviços online. Agora que você já criou seu e-mail e aprendeu as funções básicas, estará pronto para utilizar essa poderosa ferramenta no dia a dia. 
            <br>
            <br>
            Você já pode seguir para o próximo módulo!</p>
    </div>

    
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso1_page3.php">3</a>
            <a href="curso1_page4.php">4</a>
            <a href="curso1_page5.php">5</a>
            <a href="curso1_page6.php"class="active">6</a>
            <a href="curso1_page7.php">7</a>
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
