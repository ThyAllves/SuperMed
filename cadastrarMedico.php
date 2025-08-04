<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastrar Médico</title>
</head>
<body>
    <div class="container2">
        <h1>Cadastrar Médico</h1>
        <form action="cadastrarMedico.php" method="post">
            <input type="text" name="nome" placeholder="Nome do Médico" required>
            <br>
            <input type="number" name="cpf" placeholder="CPF" required>
            <br>
            <label for="dataNascimento">Data de Nascimento</label>
            
            <input type="date" name="nascimento" required>
            <br>
            <input type="submit" value="Cadastrar">
        </form>
        <a href="index.php">voltar</a>
    </div>
</body>
</html>

<?php 

include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $nascimento = trim($_POST['nascimento']);

    if (empty($nome) || empty($cpf) || empty($nascimento)) {
        echo "<script>alert('Por favor, preencha todos os campos.');</script>";
    } else {
        $sql = "INSERT INTO médico (Nome, CPF, Nascimento) VALUES ('$nome', '$cpf', '$nascimento')";
        if (mysqli_query($conexao, $sql)) {
            echo "<script>alert('Médico cadastrado com sucesso!');</script>";
        } else {
            echo "<script>alert('Erro ao cadastrar Médico!');</script>" . mysqli_error($conexao);
        }
    }
}




?>