<?php 
require 'conexao.php';
require 'editar.php';

$nome=$_POST['nome'];
$descricao=$_POST['descricao'];

$sql = "UPDATE usuarios SET nome = '$nome', descricao = '$descricao'";
mysqli_query($conexao,$sql);
?>