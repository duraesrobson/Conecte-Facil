<?php
session_start();
include('../db.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// verifica se o arquivo de imagem foi enviado
if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] == 0) {
    $foto = $_FILES['foto_perfil'];

    // define o diretório de upload
    $diretorio_upload = 'uploads/';
    
    // verificar se o diretório existe, se não, cria-lo
    if (!is_dir($diretorio_upload)) {
        mkdir($diretorio_upload, 0755, true);  // Criar o diretório com permissões
    }

    $nome_arquivo = basename($foto['name']);
    $caminho_arquivo = $diretorio_upload . $nome_arquivo;

    // Verificar o tipo de arquivo
    $tipos_permitidos = ['jpg', 'jpeg', 'png', 'gif'];
    $extensao_arquivo = strtolower(pathinfo($caminho_arquivo, PATHINFO_EXTENSION));

    if (in_array($extensao_arquivo, $tipos_permitidos)) {
        // Mover o arquivo enviado para o diretório de uploads
        if (move_uploaded_file($foto['tmp_name'], $caminho_arquivo)) {
            // Atualizar o caminho da foto de perfil no banco de dados
            $sql = "UPDATE usuarios SET foto_perfil = '$nome_arquivo' WHERE id = '$user_id'";
            if (mysqli_query($conn, $sql)) {
                // Redirecionar para a página de configurações com sucesso
                header('Location: config.php?sucesso=1');
            } else {
                echo "Erro ao atualizar a foto no banco de dados: " . mysqli_error($conn);
            }
        } else {
            echo "Erro ao fazer o upload do arquivo.";
        }
    } else {
        echo "Tipo de arquivo inválido. Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
    }
} else {
    echo "Nenhuma foto foi enviada ou ocorreu um erro no upload.";
}


?>
