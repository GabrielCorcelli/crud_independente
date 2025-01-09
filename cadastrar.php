<?php 
require 'conexao.php'; // Incluindo a conexão

// Verificando se os dados foram enviados via POST
if (isset($_POST['nome'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    // Verificando se os campos estão vazios
    if (empty($nome) || empty($descricao)) {
        header('location: index.php?status=error');
        exit(); // Evita que o código continue executando após o redirecionamento
    } else {
        // Inserindo os dados no banco de dados
        $sql = "INSERT INTO usuarios (nome, descricao) VALUES ('$nome', '$descricao')";
        if ($query=mysqli_query($conexao, $sql) || mysqli_affected_rows($query)) {
            header('location: listagem.php?status=success');
            exit(); // Evita execução do código posterior após o redirecionamento
        } else {
            echo "Erro ao inserir usuário: " . mysqli_error($conexao);
        }
    }
}


?>
