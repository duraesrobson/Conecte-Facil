<?php
// Iniciar a sessão
session_start();

// Verificar se o usuário está logado, caso contrário, redirecionar para login
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

// Incluir o arquivo de conexão com o banco de dados
include('../db.php');

// Inicializar o array de cursos
$cursos = [];

// Obter o ID do usuário logado
$user_id = $_SESSION['user_id'];

// Buscar informações do usuário
$query = "SELECT nome, foto_perfil FROM usuarios WHERE id = '$user_id'";
$result = mysqli_query($conn, $query);
$user = mysqli_fetch_assoc($result);

// Buscar os cursos em que o usuário está inscrito
$query = "
    SELECT cursos.id, cursos.nome, cursos.descricao, cursos.imagem 
    FROM cursos
    INNER JOIN inscricoes ON cursos.id = inscricoes.curso_id
    WHERE inscricoes.user_id = '$user_id'
";

$result = mysqli_query($conn, $query);

// Verificar se a consulta retornou resultados
if ($result) {
    $cursos = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/dashboard.css?v=1.7">
 <!--favicons -->
 <link rel="shortcut icon" href="../img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/favicon/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../img/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/favicon-16x16.png">
    <title>Meus Conteúdos</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
	<a href="#" class="brand">
        <img src="../img/logo_sec.png" class="bx bxs-smile"  alt="">
        </a>
		<ul class="side-menu top">
		<li>
                <a href="inicio.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Início</span>
                </a>
            </li>
            <li class="active">
                <a href="meus_cursos.php">
                    <i class='bx bxs-shopping-bag-alt'></i>
                    <span class="text">Meus Conteúdos</span>
                </a>
            </li>
            
            <li >
                <a href="formulario.php">
                    <i class='bx bxs-book'></i>
                    <span class="text">Formulário</span>
                </a>
            </li>
				
		
		
		</ul>
		<ul class="side-menu">
			<li>
				<a href="config.php">
					<i class='bx bxs-cog' ></i>
					<span class="text">Configurações</span>
				</a>
			</li>
			<li>
				<a href="../logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
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
			
			<div class="profile">
				<img id="profilePic" src="uploads/<?php echo $user['foto_perfil'];?>" alt="Foto de perfil" onclick="toggleProfileMenu()">
				<div id="profileMenu" class="profile-menu">
					<ul>
						<li><a href="config.php">Configurações</a></li>
						<li><a href="../logout.php">Sair</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1>Olá, <?php echo $user['nome']; ?>!</h1>
					<ul class="breadcrumb">
						<li>
							<a href="#">Painel</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="#">Meus Conteúdos</a>
						</li>
					</ul>
				</div>
			</div>
    </div>
	<hr>
	  
	<?php if (count($cursos) > 0) : ?>
    <?php foreach ($cursos as $index => $curso) : // $index agora é a chave (índice) ?>
        <div class="box-info">
            <li>
			<div class="bx">
                <img src="<?php echo $curso['imagem']; ?>" alt="Imagem do Curso">
				</div>
                <div class="text">
                    <h3><?php echo $curso['nome']; ?></h3>
                    <p><?php echo $curso['descricao']; ?></p>

                    <?php
                    // Define o link para a página do curso com base na ordem (index + 1)
                    $curso_number = $index + 1;
                    $curso_page = "cursos/curso" . $curso_number . ".php"; // Exemplo: cursos/curso1.php
                    ?>

                    <!-- Link para a página do curso -->
                    <a href="<?php echo $curso_page; ?>" class="btn-inscrever">Ver Conteúdo</a>
                </div>
            </li>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Você ainda não está inscrito em nenhum curso.</p>
<?php endif; ?>

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
	


	<script src="../script.js"></script>
</body>
</html>