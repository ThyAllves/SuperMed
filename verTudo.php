<?php
include 'conexao.php'; // conecta ao banco

$sql = "SELECT * FROM consultas";
$result = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consultas - SuperMed</title>
    <link rel="stylesheet" href="table.css"> <!-- seu CSS -->
</head>
<body>
    <div class="container">
        <h1>Consultas Cadastradas</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Data</th>
                    <th>Paciente</th>
                    <th>Médico</th>
                    <th>Hora</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($linha = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo date('d/m/Y', strtotime($linha['data'])); ?></td>
                            <td><?php echo $linha['paciente_id']; ?></td>
                            <td><?php echo $linha['medico_id']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr><td colspan="6">Nenhuma consulta encontrada.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
        <br>
        <a href="index.php">Voltar</a>
    </div>
</body>
</html>
