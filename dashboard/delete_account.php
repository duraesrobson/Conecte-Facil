<?php
session_start();
include('../db.php'); // Inclua a conexão com o banco de dados

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Verifique se o user_id está definido
if (!isset($_SESSION['user_id'])) {
    die("Usuário não autenticado.");
}

$user_id = $_SESSION['user_id'];


// Exemplo: apagar o usuário com base no ID da sessão
$user_id = $_SESSION['user_id'];

// Excluir inscrições relacionadas ao usuário
$delete_inscricoes_sql = "DELETE FROM inscricoes WHERE user_id = ?";
$inscricoes_stmt = $conn->prepare($delete_inscricoes_sql);
$inscricoes_stmt->bind_param("i", $user_id);
$inscricoes_stmt->execute();
$inscricoes_stmt->close();

// Agora, excluir o usuário
$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
if ($stmt->execute()) {
    session_destroy();
    header("Location: ../index.php");
    exit();
} else {
    echo "Erro ao apagar a conta: " . $stmt->error;
}


// Debug: Verifique o ID do usuário
var_dump($user_id);

$sql = "DELETE FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    // Se a conta for apagada, encerre a sessão e redirecione para a página inicial
    session_destroy();
    header("Location: ../index.php");
    exit();
} else {
    echo "Erro ao apagar a conta: " . $stmt->error; // Exibe o erro específico
}

// Feche a conexão
$stmt->close();
$conn->close();
?>
