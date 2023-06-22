<?php
include('../../banco.php');

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

    $sql = "INSERT INTO tb_alimentos VALUES (null, '$alimento_nome','$alimento_categoria','$alimento_descricao', '$alimento_imagem', '$alimento_preco', '$alimento_disponivel', '$alimento_destaque')";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-adicionar.php?alimento=$alimento_id&cadastro=ok");
        exit;
    } else {
        header("Location: form-adicionar.php?alimento=$alimento_id&cadastro=erro");
        exit;
    }

} else {

    $sql = "INSERT INTO tb_alimentos VALUES (null, '$alimento_nome','$alimento_categoria','$alimento_descricao', 'defaultfood.png', '$alimento_preco', '$alimento_disponivel', '$alimento_destaque')";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-adicionar.php?alimento=$alimento_id&cadastro=ok");
        exit;
    } else {
        header("Location: form-adicionar.php?alimento=$alimento_id&cadastro=erro");
        exit;
    }

}


?>