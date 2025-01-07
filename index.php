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
        <form action="cadastrar.php" method="post">
            <div class="form-group">
                <label for="nome">Digite seu nome</label>
                <input type="text" id="nome" name="nome" placeholder="Digite seu nome">
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" placeholder="Digite uma descrição"></textarea>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>