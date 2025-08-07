<?php 

// conexao.php
$servidor = 'sql10.freesqldatabase.com';
$usuario = 'sql10793848';
$senha = 'qLa5JIqdXG';
$database = 'sql10793848';
$porta = 3306;

$conexao = mysqli_connect($servidor, $usuario, $senha, $database, $porta);


if(!$conexao) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}
?>