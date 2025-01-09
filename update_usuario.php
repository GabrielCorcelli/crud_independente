<?php 
require 'conexao.php';


$nome=$_POST['nome'];
$descricao=$_POST['descricao'];
if (isset($_POST['update_usuario'])) {
    $usuario_id = mysqli_real_escape_string($conexao, $_POST['usuario_id']);
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $descricao = mysqli_real_escape_string($conexao, trim($_POST['descricao']));

    $sql = "UPDATE usuarios SET nome = '$nome', descricao = '$descricao' WHERE id = '$usuario_id'";
    
    if (mysqli_query($conexao, $sql)) {
        if (mysqli_affected_rows($conexao) > 0) {
            $_SESSION['mensagem'] = 'Usuário atualizado com sucesso.';
            header('Location: listagem.php?status=success');
            exit;
        } else {
            $_SESSION['mensagem'] = 'Nenhuma alteração foi feita no usuário.';
            header('Location: index.php?status=warning');
            exit;
        }
    } else {
        $_SESSION['mensagem'] = 'Erro ao atualizar os dados no banco: ' . mysqli_error($conexao);
        header('Location: 404.php?status=error');
        exit;
    }
}

?>