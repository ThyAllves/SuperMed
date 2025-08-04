<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>SuperMed - Cadastre-se</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container2">
        <h1>Cadastro de Usuário</h1>
        <form action="telaCadastro.php" method="post">
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" value="Cadastrar">
        </form>
        <a href="loginCadastro.php">Voltar</a>
    </div>
</body>
</html>


<?php
include 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $senha = trim($_POST['senha']);
    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    // Validação de campos
    if (empty($usuario) || empty($senha)) {
        echo "<script>alert('Por favor, preencha todos os campos.'); window.location.href='telaCadastro.php';</script>";
        exit();
    }

    // Prevenir SQL Injection
    $usuario = mysqli_real_escape_string($conexao, $usuario);

    // Verificar se o usuário já existe
    $checkUser = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
    $result = mysqli_query($conexao, $checkUser);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<script>alert('Usuário já existe!'); window.location.href='telaCadastro.php';</script>";
        exit();
    }

    // Criptografar senha

    // Inserir usuário
    $sql = "INSERT INTO usuarios (usuario, senha) VALUES ('$usuario', '$senhaHash')";
    if (mysqli_query($conexao, $sql)) {
        echo "<script>alert('Usuário cadastrado com sucesso!'); window.location.href='telaLogin.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar usuário: " . mysqli_error($conexao) . "');</script>";
    }
}
?>
