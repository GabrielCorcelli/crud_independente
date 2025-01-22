<?php 
require 'conexao.php'; 

if(isset($_POST['nome']) || isset($_POST['descricao'])){
    $nome=mysqli_real_escape_string($conexao,$_POST['nome']);
    $descricao=mysqli_real_escape_string($conexao,$_POST['descricao']);
    

    $sql= "INSERT INTO usuarios (nome,descricao) VALUES ('$nome','$descricao')";

    if($query = mysqli_query($conexao,$sql) || mysqli_affected_rows($query)){
        header('location: listagem.php?status=success');
        exit;
    }
    else{
        echo "Erro ao inserir usuário".mysqli_error($conexao);
    }
}


?>
