<?php
// Iniciar a sessão
session_start();

// Destruir todas as variáveis de sessão
$_SESSION = array();

// Se desejado, destruir a sessão também
session_destroy();

// Redirecionar para a página de login
header('Location: index.php');
exit();
?>
