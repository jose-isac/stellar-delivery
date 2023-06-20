<?php
include('banco.php');

$alimento = $_POST['alimento_id'];
$quantidade = $_POST['alimento_quantidade'];
$usuario = $_POST['usuario_id'];

$sql = "INSERT INTO tb_pedidos VALUES(null, '$usuario', '$alimento', '$quantidade');";

$resultado = $conexao_banco->query($sql);

if ($resultado){
    echo 'certo';
} else {
    echo 'errado';
}

?>