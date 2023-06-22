<?php
include('../../banco.php');

$texto = $_POST['pesquisa'];

$sql = "SELECT * FROM tb_alimentos WHERE alimento_nome LIKE '%".$texto."%'";

$resultado = $conexao_banco->query($sql);

if ($resultado) {
    if ($resultado->num_rows > 0) {
        while($linha = $resultado->fetch_array(MYSQLI_ASSOC)){
            echo '
            <tr>
            <td>'.$linha['alimento_id'].'</td>
            <td>'.$linha['alimento_nome'].'</td>
            <td>'.$linha['alimento_categoria'].'</td>
            <td>'.$linha['alimento_descricao'].'</td>
            <td>'.$linha['alimento_imagem'].'</td>
            <td>R$ '.$linha['alimento_preco'].'</td>
            <td>'.$linha['alimento_disponivel'].'</td>
            <td>'.$linha['alimento_destaque'].'</td>
            <td>
                <a class="btn btn-warning" href="form-alterar.php?alimento='.$linha['alimento_id'].'"><i class="fa-solid fa-pencil"></i></a>
            </td>
            <tr>
            ';
        }
    } else {
        echo '0';
    }
}
?>