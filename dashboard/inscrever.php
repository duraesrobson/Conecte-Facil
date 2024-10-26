<?php
session_start();
include('../db.php');

// Verificar se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Usuário não logado.']);
    exit();
}

$user_id = $_SESSION['user_id'];

// Função para inscrever em um curso
function inscreverCurso($userId, $cursoId, $conn) {
    // Verificar quantos cursos o usuário já está inscrito
    $query = "SELECT COUNT(*) as total FROM inscricoes WHERE user_id = '$userId'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    if ($data['total'] >= 4) {
        return ['success' => false, 'message' => 'Você já está inscrito em todos os cursos.'];
    }

    // Tentar inserir a inscrição
    $insertQuery = "INSERT IGNORE INTO inscricoes (user_id, curso_id) VALUES ('$userId', '$cursoId')";
    if (mysqli_query($conn, $insertQuery)) {
        if (mysqli_affected_rows($conn) > 0) {
            return ['success' => true];
        } else {
            return ['success' => false, 'message' => 'Você já está inscrito neste curso.'];
        }
    }
    return ['success' => false, 'message' => 'Erro ao inserir a inscrição.'];
}

// Obter o ID do curso do corpo da requisição
$data = json_decode(file_get_contents('php://input'), true);
$cursoId = $data['cursoId'];

// Inscrever o usuário no curso
$response = inscreverCurso($user_id, $cursoId, $conn);

// Retornar a resposta como JSON
echo json_encode($response);
