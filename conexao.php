<?php
$servidor = 'sql10.freesqldatabase.com';
$usuario = 'sql10793848';
$senha = 'qLa5JIqdXG';
$database = 'sql10793848';
$porta = 3306;

// Criar conexão
$conexao = mysqli_init();

// Adiciona SSL vazio (resolve problema com alguns bancos gratuitos)
mysqli_ssl_set($conexao, NULL, NULL, NULL, NULL, NULL);

// Tenta conectar
if (mysqli_real_connect($conexao, $servidor, $usuario, $senha, $database, $porta, NULL, MYSQLI_CLIENT_SSL)) {
    echo "✅ Conectado com sucesso!";
} else {
    echo "❌ Erro: " . mysqli_connect_error();
}
?>
