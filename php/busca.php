<?php 
include('banco.php');
$texto = $_POST['pesquisa'];

$sql = "SELECT * FROM tb_alimentos WHERE alimento_nome like '%".$texto."%'";

$resultado = $conexao_banco->query($sql);

if ($resultado){
    if ($resultado->num_rows > 0) {
        while($linha = $resultado->fetch_array(MYSQLI_ASSOC)){

            echo '<div class="col-md-4 my-3">
                    <div class="card" data-alimentoid = "'.$linha['alimento_id'].'" id="'.$linha['alimento_nome'].'" data-descricao= "'.$linha['alimento_descricao'].'" data-categoria="'.$linha['alimento_categoria'].'" data-preco="'.$linha['alimento_preco'].'" data-disponivel="'.$linha['alimento_disponivel'].'">
                    <img src="https://via.placeholder.com/150" class="card-img-top" alt="Produto 1">
                    <div class="card-body">
                        <h5 class="card-title">'.$linha['alimento_nome'].'</h5>
                        <p class="card-text">'.$linha['alimento_descricao'].'</p>
                    </div>
                    </div>
                </div>';
        }
    } else {
        echo '0';
    }
}

?>