<?php 

if(function_exists('mysqli_connect')) {
    include 'conexao.php';
} else {
    echo "<script>alert('A extensão MySQLi não está habilitada.');</script>";
    
}
 
phpinfo();

?>