<?php
include('../db.php'); // Inclua o arquivo de conexão com o banco de dados

if (isset($_POST['campo']) && isset($_POST['valor'])) {
    $campo = $_POST['campo'];
    $valor = $_POST['valor'];
    $user_id = $_SESSION['user_id'];    // Supondo que o ID do usuário esteja na sessão


    // Prepare a query para atualizar o campo correto
    $query = "UPDATE usuarios SET $campo = '$valor' WHERE id = '$usuario'";
    
    if (mysqli_query($conn, $query)) {
        echo "Informação atualizada com sucesso!";
    } else {
        echo "Erro ao atualizar: " . mysqli_error($conn);
    }
}
?>
