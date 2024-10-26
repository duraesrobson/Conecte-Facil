<?php
// Definir os parâmetros de conexão corretamente
$servername = "localhost";
$username = "u789064757_conectefacil"; // Nome de usuário padrão do MySQL no XAMPP
$password = "!R24251916r"; // Senha padrão do MySQL no XAMPP (deixe vazio se não houver senha)
$dbname = "u789064757_conecte_facil"; // Nome do seu banco de dados

// Criar conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
