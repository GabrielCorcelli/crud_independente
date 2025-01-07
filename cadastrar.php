<?php 
define('HOST','localhost');
define('USUARIO','root');
define('SENHA','');
define('DB','meu_db');


        if(isset($_POST['nome'],$_POST['descricao'])){
        $conexao = mysqli_connect(HOST,USUARIO,SENHA,DB);}




        $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
        $descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);

            if(empty($_POST['descricao']&& $_POST['nome'])){
                header('location: index.php?status=error');
    
            }
            else{
                $sql = "INSERT INTO usuarios (nome, descricao) VALUES ('$nome', '$descricao')";
                mysqli_query($conexao,$sql);
                 if(mysqli_affected_rows($conexao)>0){
                    header('location: listagem.php?status=success');
                    echo "Usuário inserido com sucesso";

                 }
                
            
            }

   
       
    

?>