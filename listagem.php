<?php
require 'conexao.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f9;
            color: #333;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background: #fff;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            text-align: left;
            padding: 12px;
        }

        th {
            background: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background: #f9f9f9;
        }

        tr:hover {
            background: #f1f1f1;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-edit {
            background: #ffc107;
        }

        .btn-delete {
            background: #dc3545;
        }
    </style>
</head>

<body>
    <h1>Lista de Usuários</h1>
    <a href="index.php" style="text-decoration: none; display: inline-block; padding: 10px 20px; background-color: #007BFF; color: #fff; border-radius: 5px; text-align: center;">Voltar</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Consulta para buscar os usuários
            $sql = 'SELECT * FROM usuarios';
            $usuarios = mysqli_query($conexao, $sql);

            
if (mysqli_num_rows($usuarios) > 0) {
    // Loop para exibir os usuários na tabela
    while ($usuario = mysqli_fetch_assoc($usuarios)) {
        ?>
        <tr>
            <td><?= htmlspecialchars($usuario['id']) ?></td>
            <td><?= htmlspecialchars($usuario['nome']) ?></td>
            <td><?= htmlspecialchars($usuario['descricao']) ?></td>
            <td class="actions">
                <!-- Link para editar -->
                <a href="editar.php?id=<?= urlencode($usuario['id']) ?>" class="btn btn-edit">Editar</a>

                <!-- Formulário para excluir -->
                <form action="excluir.php" method="post" style="display:inline;">
                    <button onclick="return confirm('Certeza que quer excluir?')" 
                            type="submit" 
                            name="delete_usuario" 
                            value="<?= htmlspecialchars($usuario['id']) ?>" 
                            class="btn btn-delete">
                        Excluir
                    </button>
                </form>
            </td>
        </tr>
        <?php
    }
} else {
    ?>
    <tr>
        <td colspan="4">Nenhum usuário encontrado</td>
    </tr>
    <?php
}
?>

            
        </tbody>
    </table>
</body>

</html>
