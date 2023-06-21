<?php
include('../../banco.php');

$texto = $_POST['pesquisa'];

$sql = "SELECT * FROM tb_usuarios WHERE usuario_nome LIKE '%".$texto."%'";

$resultado = $conexao_banco->query($sql);

if ($resultado) {
    if ($resultado->num_rows > 0) {
        while($linha = $resultado->fetch_array(MYSQLI_ASSOC)){
            echo '
                <tr data-usuarioid="'.$linha['usuario_id'].'" data-usuario-nome="'.$linha['usuario_nome'].'" data-usuario-email="'.$linha['usuario_email'].'" data-usuario-senha="'.$linha['usuario_senha'].'" data-usuario-telefone="'.$linha['usuario_telefone'].'" data-usuario-cpf="'.$linha['usuario_cpf'].'" data-usuario-foto="'.$linha['usuario_foto'].'" data-usuario-cep="'.$linha['usuario_cep'].'" data-usuario-estado="'.$linha['usuario_estado'].'" data-usuario-cidade="'.$linha['usuario_cidade'].'" data-usuario-bairro="'.$linha['usuario_bairro'].'" data-usuario-rua="'.$linha['usuario_rua'].'" data-usuario-numero="'.$linha['usuario_numero'].'" data-usuario-complemento="'.$linha['usuario_complemento'].'" data-usuario-adm="'.$linha['usuario_adm'].'">

                    <td>'.$linha['usuario_id'].'</td>
                    <td>'.$linha['usuario_nome'].'</td>
                    <td>'.$linha['usuario_email'].'</td>
                    <td>'.$linha['usuario_telefone'].'</td>
                    <td>'.$linha['usuario_cpf'].'</td>
                    <td>
                        <a class="btn btn-warning" href="form-alterar.php?usuario='.$linha['usuario_id'].'"><i class="fa-solid fa-pencil"></i></a>
                    </td>

                </tr>
            ';
        }
    } else {
        echo '0';
    }
}
?>