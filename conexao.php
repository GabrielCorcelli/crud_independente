<?php 
define('HOST','localhost');
define('USUARIO','root');
define('SENHA','');
define('DB','meu_db');

// Conexão com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);
if (!$conexao) {
    die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
}
?>
