<?php
include('../../banco.php');

$usuario_id = $_GET['usuario'];

$sql = "DELETE FROM tb_usuarios WHERE usuario_id = '$usuario_id'";

$resultado = $conexao_banco->query($sql);

if ($resultado) {
    header("Location: usuarios.php?excluir=ok");
} else {
    header("Location: usuarios.php?excluir=erro");
}

?>