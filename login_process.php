<?php
session_start();
include('db.php');

// Verificar se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = mysqli_real_escape_string($conn, $_POST['username']);
    $senha = mysqli_real_escape_string($conn, $_POST['password']);

    // Consultar o banco de dados
    $query = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        // Verificar a senha
        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido
            $_SESSION['user_id'] = $row['id']; // ou qualquer outro identificador do usuário
            header('Location: dashboard/inicio.php');
            exit();
        } else {
            // Senha incorreta
            $_SESSION['login_error'] = 'Senha incorreta.';
            header('Location: login.php');
            exit();
        }
    } else {
        // Usuário não encontrado
        $_SESSION['login_error'] = 'Usuário não encontrado.';
        header('Location: login.php');
        exit();
    }
}
?>
