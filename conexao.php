<?php 

// conexao.php
$servidor = 'sql10.freesqldatabase.com';
$usuario = 'sql10793848';
$senha = 'qLa5JIqdXG';
$database = 'sql10793848';
$porta = 3306;

$conexao = new mysqli($servidor, $usuario, $senha, $database, $porta);

if ($conexao) {
    echo "<script>alert('Conectado com sucesso!');</script>";
    exit();
}
?>