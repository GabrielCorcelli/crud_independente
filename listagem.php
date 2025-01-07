<?php
// Configurações do banco de dados
define('HOST', 'localhost');
define('USUARIO', 'root');
define('SENHA', '');
define('DB', 'meu_db');

// Conexão com o banco de dados
$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB);

// Verifica a conexão
if (!$conexao) {
    die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
}

// Consulta para obter os usuários
$sql = "SELECT nome, descricao FROM usuarios";
$resultado = mysqli_query($conexao, $sql);

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
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
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
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($resultado) > 0) {
                // Exibe os dados de cada linha
                while ($linha = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($linha['nome']) . "</td>";
                    echo "<td>" . htmlspecialchars($linha['descricao']) . "</td>";
                    echo "<td class='actions'>";
                    echo "<a href='editar.php?nome=" . urlencode($linha['nome']) . "' class='btn btn-edit'>Editar</a>";
                    echo "<a href='excluir.php?nome=" . urlencode($linha['nome']) . "' class='btn btn-delete'>Excluir</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Nenhum usuário encontrado.</td></tr>";
            }

            // Fecha a conexão
            mysqli_close($conexao);
            ?>
        </tbody>
    </table>
</body>
</html>
