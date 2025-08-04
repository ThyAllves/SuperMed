<?php 

// conexao.php
$host = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'consultas';

$conexao = mysqli_connect($host, $usuario, $senha, $database);
if (!$conexao) {
    echo "<script>alert('Erro ao conectar ao banco de dados: " . mysqli_connect_error() . "');</script>";
    exit();
}
?>