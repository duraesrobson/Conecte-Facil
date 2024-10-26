<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta property="og:title" content="Conecte Fácil" />
    <meta property="og:description" content="Capacitando Idosos no Mundo Digital" />
    <meta property="og:image" content="https://www.conectefacil.site/img/conecte-sub.png" />
    <meta property="og:url" content="https://www.conectefacil.site" />
    <meta property="og:type" content="website" />
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/styles.css?v=1.5">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>

     <!--favicons -->
     <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <title>Conecte Fácil</title>
</head>
<body>
    <header>
        <nav id="navbar">
            <img src="img/logo_sec.svg" id="nav_logo"></i>

            <ul id="nav_list">
                <li class="nav-item active">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Conteúdos</a>
                </li>
            </ul>

            <a href="login.php" class="btn-default">Entrar</a>

            <button id="mobile_btn">
                <i class="fa-solid fa-bars"></i>
            </button>
        </nav>

        <div id="mobile_menu">
            <ul id="mobile_nav_list">
                <li class="nav-item">
                    <a href="#home">Início</a>
                </li>
                <li class="nav-item">
                    <a href="#menu">Conteúdos</a>
                </li>
            </ul>

            <a href="login.php" class="btn-default">Entrar</a>
        </div>
    </header>

    <main id="content">
        <section id="home">
            <div class="shape"></div>
            <div id="cta">
                <h1 class="title">
                    <span>Capacitando Idosos</span> no 
                    Mundo Digital
                </h1>

                <p class="description">
                    Na <b>CONECTE</b> <b class="bgreen">FÁCIL</b>, acreditamos que a tecnologia deve ser acessível a todos. 
                    Oferecemos conteúdos didáticos <span>gratuitos</span> para capacitar idosos a navegar no mundo digital, enviar mensagens e realizar videochamadas. Junte-se a nós e torne a tecnologia uma aliada na sua vida!
                </p>

                <div id="cta_buttons">
                    <a href="cadastro2.php" class="btn-default">
                        Comece Agora!
                    </a>

                    <a href="login.php" class="login_button">
                        Já tenho login
                    </a>
                </div>

                  
            </div>

            <div id="banner">
                <img src="img/elderly.svg" alt="">
            </div>
        </section>

        <section id="menu">
            <h1 class="title">Conteúdos</h1>
            <h3 class="section-subtitle">Confira nossos conteúdos gratuitos disponíveis para você!</h3>

            <div class="dish">
              <img src="img/elderhug.jpg" class="dish-image" alt="">
            <div class="dish-content">
              <h3 class="dish-title">Introdução ao Uso do Computador</h3>
                <span class="dish-description">Conheça os navegadores de internet, aprenda a fazer buscas eficientes no Google e descubra como acessar sites confiáveis e seguros.</span>
                  <div class="dish-price">
                  <a href="login.php"><button class="btn-default">Inscreva-se</button></a> 
                  </div>
    </div>
  </div>
  

  <div class="dish">
              <img src="img/talking.jpg" class="dish-image-dois" alt="">
            <div class="dish-content">
              <h3 class="dish-title">Usando Aplicativos Essenciais no Celular e Tablet</h3>
                <span class="dish-description">Conecte-se com o mundo através dos apps, aprenda a baixar e usar aplicativos de comunicação e vídeo chamadas.</span>
                  <div class="dish-price">

            <a href="login.php"><button class="btn-default">Inscreva-se</button></a> 
        </div>
    </div>
  </div>

              
        </section>

        
    </main>

    <footer>
        <img src="img/logo_sec.svg" alt="" class="footerimg">

        <div id="footer_items">
            <span id="copyright">
                Projeto desenvolvido por: Robson Durães
            </span>
        </div>
    </footer>
    <script src="javascript/script.js"></script>
</body>
</html>