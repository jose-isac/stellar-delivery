<?php
include('../../banco.php');

$alimento_id = $_GET['alimento'];

$sql = "DELETE FROM tb_alimentos WHERE alimento_id = '$alimento_id'";

$resultado = $conexao_banco->query($sql);

if ($resultado) {
   header("Location: alimentos.php?excluir=ok");
} else {
   header("Location: alimentos.php?excluir=erro");
}


?>