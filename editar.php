<?php 
require 'conexao.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Estilizado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <h1>Cadastro</h1>
        
        <?php       
                        if (isset($_GET['id'])){
                            $usuario_id = mysqli_real_escape_string($conexao, $_GET['id']);
                            $sql = "SELECT * FROM usuarios WHERE id='$usuario_id'";
                            $query = mysqli_query($conexao, $sql);
                            if(mysqli_num_rows($query) > 0){
                                $usuario = mysqli_fetch_array($query);
                        ?>
            <div class="form-group">
                <label for="nome">Digite seu nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome" value="<?=$usuario['nome']?>">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite uma descrição"><?=$usuario['descricao']?></textarea>

            </div>
                    <button type="submit"name ="update_usuario">Atualizar</button>
                  
                    <?php 
                            }
                        }else{
                            echo "<h5>Usuário não encontrado<h5>";
                        }
                    
                        ?>
        
    </div>
</body>
</html>
