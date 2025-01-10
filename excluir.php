<?php 
require 'conexao.php';

if (isset($_POST['delete_usuario'])) {
    // Sanitiza a entrada do usuário para evitar SQL Injection
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['delete_usuario']);

    // Query de exclusão
    $sql = "DELETE FROM usuarios WHERE id = '$usuario_id'";

    // Executa a query e verifica se a exclusão foi bem-sucedida
    if (mysqli_query($conexao, $sql)) {
        echo "Usuário excluído com sucesso!";
        header('location: listagem.php?status=success');
        exit;
    } else {
        echo "Erro ao excluir usuário: " . mysqli_error($conexao);
        header('location: listagem.php?status=error');
        exit;
    }
}

?>
