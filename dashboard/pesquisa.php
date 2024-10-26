<?php
// Incluir a conexão com o banco de dados
include('../db.php');

// Verificar se o termo da pesquisa foi enviado
if (isset($_POST['termo'])) {
    $termo = mysqli_real_escape_string($conn, $_POST['termo']);

    // Consultar os cursos que correspondem ao termo de pesquisa
    $query = "SELECT * FROM cursos WHERE nome LIKE '%$termo%'";
    $result = mysqli_query($conn, $query);

    // Verificar se há resultados
    if (mysqli_num_rows($result) > 0) {
        // Iterar sobre os resultados e exibir cada curso encontrado
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="box-info">
                <li>
                    <div class="bx">
                        <img src="../img/' . $row['imagem'] . '" alt="">
                    </div>
                    <div class="text">
                        <h3>' . $row['nome'] . '</h3>
                        <p>' . $row['descricao'] . '</p>
                        <button class="btn-inscrever" onclick="inscrever(' . $row['id'] . ')">Começar agora!</button>
                    </div>
                </li>
            </div>';
        }
    } else {
        echo '<p>Nenhum curso encontrado.</p>';
    }
} else {
    echo '<p>Erro ao processar a pesquisa.</p>';
}
?>
