<?php 
require 'conexao.php'; 

if (isset($_POST['nome'])) {
    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

    
    if (empty($nome) || empty($descricao)) {
        header('location: index.php?status=error');
        exit(); 
    } else {
        
        $sql = "INSERT INTO usuarios (nome, descricao) VALUES ('$nome', '$descricao')";
        if ($query=mysqli_query($conexao, $sql) || mysqli_affected_rows($query)) {
            header('location: listagem.php?status=success');
            exit(); 
        } else {
            echo "Erro ao inserir usuário: " . mysqli_error($conexao);
        }
    }
}


?>
