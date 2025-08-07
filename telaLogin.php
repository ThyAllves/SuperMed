<?php 
ob_start();
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['usuario']) && !empty($_POST['senha'])) {
        include_once("conexao.php");

        $usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
        $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
        $resultado = mysqli_query($conexao, $sql);
        
        if ($resultado && mysqli_num_rows($resultado) > 0) {
            $usuarioData = mysqli_fetch_assoc($resultado);

            if (password_verify($senha, $usuarioData['senha'])) {
                $_SESSION['usuario'] = $usuario;
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['erro_login'] = "Senha incorreta!";
                header("Location: telaLogin.php");
                exit();
            }
        } else {
            $_SESSION['erro_login'] = "Usuário não encontrado!";
            header("Location: telaLogin.php");
            exit();
        }
    }
}
?>


<!-- HTML da tela de login -->
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - SuperMed</title>
    <link rel="stylesheet" href="style.css?v=1.0">
</head>
<body>
    <div class="container2">
        <form action="telaLogin.php" method="post">
            <h1>Conecte-se</h1>
            <input type="text" name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha" placeholder="Senha" required>
            <input type="submit" value="Entrar" id="btnLogin">
            <a href="loginCadastro.php">Voltar</a>
        </form>
    </div>

    <?php
    if (isset($_SESSION['erro_login'])) {
        echo "<script>alert('Usuário ou senha incorretos!');</script>";
        unset($_SESSION['erro_login']);
    }
    ?>
</body>
</html>
<?php ob_end_flush();?>