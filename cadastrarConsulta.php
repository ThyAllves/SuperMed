<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Consulta</title>
</head>
<body>
    <div class="container2">
        <h1>Cadastrar Consulta</h1>
        <form action="cadastrarConsulta.php" method="post">   
        <label for="dataConsulta">Data da Consulta</label>
        <br>
            <input type="date" name="dataConsulta">
            <br>
            <input type="number" placeholder="CPF do Paciente" name="cpf" required>
            <br>
            <input type="number" placeholder="Código do Médico" name="codMedico" required>
            <br>
            <input type="submit">
        </form>
        <a href="index.php">voltar</a>
    </div>
</body>
</html>


<?php 

    include 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $data = trim($_POST['dataConsulta']);
        $cpfPaciente = trim($_POST['cpf']);
        $codMedico = trim($_POST['codMedico']);

        if (empty($data) || empty($cpfPaciente) || empty($codMedico)) {
            echo "<script>alert('Por favor, preencha todos os campos.');</script>";
        } else {
            $sql = "INSERT INTO consultas (data, paciente_id, medico_id) VALUES ('$data', '$cpfPaciente', '$codMedico')";
            if (mysqli_query($conexao, $sql)) {
                echo "<script>alert('Consulta cadastrada com sucesso!');</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar consulta!');</script>" . mysqli_error($conexao);
            }
        }
    }



?>