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
    <h1 class="custom-header-big">Usando Aplicativos Essenciais no Celular e Tablet</h1>
   
        <hr>
        
        <h1 class="custom-header">Objetivo do Tema:</h1>
        <p>Todo o conteúdo deste tema <b>EM VÍDEO</b> foi desenvolvido e disponibilizado gratuitamente pelo canal do YouTube <a href="https://www.youtube.com/c/CursoR%C3%A1pido"><b class="blue">Curso Rápido</b></a> (clique para acessar), para ensinar de maneira prática e didática o uso básico do celular e aplicativos voltados ao sistema Android, que é o sistema mais usado. Com foco em promover a autonomia digital, o conteúdo é dividido em 13 partes que abordam desde os primeiros passos com o celular até o uso de redes sociais e arquivos em nuvem.</p>
        
        <h2 class="custom-subheader">Conteúdo do Tema</h2>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 1: Introdução ao Android</h2>
            <p>O sistema operacional mais comum em smartphones. Aprenda sobre os principais botões do aparelho, navegação no sistema, uso das câmeras e como fazer ligações. Dicas para manter o telefone atualizado também são abordadas.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 2: Aplicativo de Contatos</h3>
            <p>Aprenda a usar o aplicativo de Contatos no Android para adicionar, editar e excluir contatos. Veja como marcar favoritos e fazer ligações diretamente do app, facilitando a organização da sua agenda.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 3: Aplicativos de Agenda e Relógio</h3>
            <p>Explore os aplicativos de Agenda e Relógio. Aprenda a adicionar compromissos, configurar notificações e alarmes. O app de relógio também oferece funções como cronômetro e timer para facilitar seu dia a dia.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 4: Acessando a Internet</h3>
            <p>Descubra como acessar Wi-Fi e dados móveis no Android. Aprenda a configurar redes, economizar bateria e usar atalhos rápidos. O modo avião e suas funcionalidades também são abordados.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 5: Instalação de Aplicativos</h3>
            <p>Aprenda a instalar e remover aplicativos na Play Store. Entenda a importância de usar fontes seguras e como desinstalar apps desnecessários para liberar espaço no seu telefone.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 6: Acesso à Internet no Celular com Navegadores</h3>
            <p>Saiba como usar o Google Chrome para navegar na internet. Aprenda a acessar sites, fazer pesquisas, explorar imagens e voltar para páginas anteriores, tudo de forma simples e prática.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 7: Como Usar o YouTube no Celular</h3>
            <p>Aprenda a usar o YouTube para assistir a vídeos. Descubra como abrir o aplicativo, pesquisar vídeos, controlar a reprodução e interagir com o conteúdo. Também veja como se inscrever em canais, comentar, compartilhar e assistir em tela cheia. Dicas para filtrar informações e navegar facilmente na plataforma.</p>
        </div>
        
        <div class="custom-content-section">
            <h3 class="custom-title">Parte 8: Introdução à Câmera no Android</h3>
            <p>Aprenda a usar a câmera do seu dispositivo Android para tirar fotos e gravar vídeos. A câmera é um aplicativo nativo acessível facilmente. Descubra como abrir o aplicativo, utilizar os botões principais, ajustar configurações como flash e resolução, visualizar e apagar fotos, e compartilhar com amigos. Explore as opções do seu modelo para aproveitar ao máximo a experiência.</p>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">Parte 9: Fotos e Vídeos no Android</h3>
            <p>Aprenda a organizar suas fotos e vídeos no aplicativo "Fotos" do Android. Descubra como visualizar suas imagens, criar álbuns, mover e excluir fotos, e utilizar a lixeira para recuperar itens apagados. Explore recursos como categorias de fotos e dicas para manter seu armazenamento otimizado, além de aprender a fazer limpezas periódicas e criar álbuns temáticos para uma melhor organização.</p>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">Parte 10: Arquivos na Nuvem</h3>
            <p>Aprenda a organizar seus arquivos usando o Google Drive. Descubra como fazer upload de arquivos, visualizar e compartilhar imagens. Veja também como usar o aplicativo Fotos para transferir arquivos para a nuvem e gerenciar suas fotos de forma eficiente. Aprenda a excluir arquivos e a importância da nuvem como cópia de segurança. Dicas para acessar seus arquivos de qualquer dispositivo e manter tudo organizado.</p>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">Parte 11: Criando Pastas e Organizando Documentos na Nuvem</h3>
            <p>Aprenda a criar pastas e organizar seus documentos no Google Drive. Descubra como transferir arquivos para a nuvem, mover imagens para pastas específicas e renomear arquivos. Verifique sua organização e saiba como a nuvem serve como cópia de segurança. Aprenda a visualizar arquivos em diferentes formatos e a manter tudo bem estruturado. Dicas para uma gestão eficiente dos seus documentos.</p>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">Parte 12: Introdução ao WhatsApp</h3>
            <p>Aprenda a instalar e usar o WhatsApp para mensagens. Veja como cadastrar contatos, iniciar conversas e enviar mensagens de texto, emojis e GIFs. Descubra dicas para responder mensagens e adicionar legendas aos GIFs. Acompanhe as etapas para se familiarizar com o aplicativo e aproveite a comunicação instantânea. Dicas extras para otimizar sua experiência no WhatsApp.</p>
        </div>

        <div class="custom-content-section">
            <h3 class="custom-title">Parte 13: WhatsApp: Outros Recursos</h3>
            <p>Continue explorando o WhatsApp aprendendo a apagar mensagens enviadas, compartilhar imagens e documentos, gravar e ouvir áudios, além de fazer ligações e videoconferências. Descubra como enviar mensagens de voz usando o microfone do teclado e adicionar legendas a arquivos antes de enviá-los. Pratique esses recursos para aprimorar sua experiência com o aplicativo e se comunicar de forma mais eficiente.</p>
        </div>
        
        <h2 class="custom-subheader">Conclusão</h2>
        <p>No final do conteúdo, o objetivo é que você se sinta à vontade usando a tecnologia, sem precisar da ajuda de netos ou familiares. As partes foram pensadas para serem simples, práticas e fáceis de seguir, garantindo que você adquira as habilidades necessárias para dominar o celular e navegar com confiança no mundo digital.</p>
    </div>
          

        <!-- PAGINAÇÃO -->
        <div class="pagination">
            <a href="#"><</a> <!-- Botão "anterior" -->
            <a href="curso2.php" class="active">1</a> <!-- Página ativa -->
            <a href="curso2_page2.php">2</a>
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
