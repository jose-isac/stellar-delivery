<?php
include('../../banco.php');

$alimento_id = $_POST['alimento_id'];

$alimento_nome = $_POST['alimento_nome'];
$alimento_categoria = $_POST['alimento_categoria'];
$alimento_descricao = $_POST['alimento_descricao'];
$alimento_preco = $_POST['alimento_preco'];

$alimento_preco = str_replace(',', '.', $alimento_preco);

$alimento_disponivel = $_POST['alimento_disponivel'];
$alimento_destaque = $_POST['alimento_destaque'];


// Se receber a foto do alimento

if (isset($_FILES["fotoAlimento"]) && $_FILES["fotoAlimento"]["error"] == 0) {
    
    $fotoNome = $_FILES['fotoAlimento']['name'];
    $fotoTmp = $_FILES['fotoAlimento']['tmp_name'];

    $alimento_imagem = $fotoNome;

    move_uploaded_file($fotoTmp, "../../food_images/" . $fotoNome);

    $sql = "UPDATE tb_alimentos SET alimento_nome = '$alimento_nome', alimento_categoria = '$alimento_categoria', alimento_descricao = '$alimento_descricao', alimento_imagem = '$alimento_imagem', alimento_preco = '$alimento_preco', alimento_disponivel = '$alimento_disponivel', alimento_destaque = '$alimento_destaque' WHERE alimento_id = '$alimento_id'";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-alterar.php?alimento=$alimento_id&alteracao=ok");
        exit;
    } else {
        header("Location: form-alterar.php?alimento=$alimento_id&alteracao=erro");
        exit;
    }

} else {

    $sql = "UPDATE tb_alimentos SET alimento_nome = '$alimento_nome', alimento_categoria = '$alimento_categoria', alimento_descricao = '$alimento_descricao', alimento_preco = '$alimento_preco', alimento_disponivel = '$alimento_disponivel', alimento_destaque = '$alimento_destaque' WHERE alimento_id = '$alimento_id'";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-alterar.php?alimento=$alimento_id&alteracao=ok");
        exit;
    } else {
        header("Location: form-alterar.php?alimento=$alimento_id&alteracao=erro");
        exit;
    }

}


?>