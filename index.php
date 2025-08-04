<?php
session_start();

// Impede acesso sem login
if (!isset($_SESSION['usuario'])) {
    header("Location: telaLogin.php");
    exit();
}

$logado = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início - SuperMed</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <div class="container1">
        <h1>SuperMed</h1>
        <h3>Bem-vindo, <?= htmlspecialchars($logado); ?>!</h3>
        <a href="cadastrarConsulta.php">Cadastrar Consulta</a>
        <a href="cadastrarPaciente.php">Cadastrar Paciente</a>
        <a href="cadastrarMedico.php">Cadastrar Médico</a>
        <a href="verTudo.php">Ver todas as Consultas</a>
        <a href="logout.php">Sair</a>
    </div>
</body>
</html>
