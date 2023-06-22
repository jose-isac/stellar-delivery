<?php
include('../../banco.php');

$pedido_id = $_GET['pedido'];

$sql = "DELETE FROM tb_pedidos WHERE pedido_id = $pedido_id";

$resultado = $conexao_banco->query($sql);

if ($resultado) {
    header("Location: pedidos.php?excluir=ok");
    exit;
} else {
    header("Location: pedidos.php?excluir=erro");
    exit;
}

?>