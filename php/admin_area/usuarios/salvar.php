<?php

include('../../banco.php');

$usuario_id = $_POST['usuario_id'];

$usuario_nome = $_POST['usuario_nome'];
$usuario_email = $_POST['usuario_email'];
$usuario_senha = $_POST['usuario_senha'];

$usuario_telefone = $_POST['usuario_telefone'];
$usuario_telefone = preg_replace('/\D/', '', $usuario_telefone);

$usuario_cpf = $_POST['usuario_cpf'];
$usuario_cpf = preg_replace('/\D/', '', $usuario_cpf);

$usuario_cep = $_POST['usuario_cep'];
$usuario_estado = $_POST['usuario_estado'];
$usuario_cidade = $_POST['usuario_cidade'];
$usuario_bairro = $_POST['usuario_bairro'];
$usuario_endereco = $_POST['usuario_rua'];
$usuario_numero = $_POST['usuario_numero'];
$usuario_complemento = $_POST['usuario_complemento'];
$usuario_adm = $_POST['usuario_adm'];

//Testar se já existe este cpf e email

$sql_teste2 = "SELECT * FROM tb_usuarios WHERE usuario_cpf = '$usuario_cpf' AND usuario_email = '$usuario_email'";

$teste2 = $conexao_banco->query($sql_teste2);

if ($teste2->num_rows > 0) {
    header("Location: form-adicionar.php?cadastro=cpf-e-email-ja-cadastrados");
    exit;
}

// Testar se já existe este cpf

$sql_teste1 = "SELECT * FROM tb_usuarios WHERE usuario_cpf = '$usuario_cpf'";

$teste1 = $conexao_banco->query($sql_teste1);

if ($teste1->num_rows > 0){
    header("Location: form-adicionar.php?cadastro=cpf-ja-cadastrado");
    exit;
}

// Testar se já existe este email

$sql_teste3 = "SELECT * FROM tb_usuarios WHERE usuario_email = '$usuario_email'";

$teste3 = $conexao_banco->query($sql_teste3);

if ($teste3->num_rows > 0) {
    header("Location: form-adicionar.php?cadastro=email-ja-cadastrado");
    exit;
}


// Se receber a foto do perfil 

if (isset($_FILES["fotoPerfil"]) && $_FILES["fotoPerfil"]["error"] == 0) {
    
    $fotoNome = $_FILES['fotoPerfil']['name'];
    $fotoTmp = $_FILES['fotoPerfil']['tmp_name'];

    $usuario_foto = $fotoNome;

    move_uploaded_file($fotoTmp, "../../user_images/" . $fotoNome);

    $sql = "INSERT INTO tb_usuarios VALUES(null, '$usuario_nome', '$usuario_email', '$usuario_senha',  '$usuario_telefone', '$usuario_foto', '$usuario_cpf', '$usuario_cep', '$usuario_estado', '$usuario_cidade', '$usuario_bairro', '$usuario_endereco', '$usuario_numero', '$usuario_complemento', '$usuario_adm');";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-adicionar.php?cadastro=ok");
        exit;
    } else {
        header("Location: form-adicionar.php?cadastro=erro");
        exit;
    }

} else {

    $sql = "INSERT INTO tb_usuarios VALUES(null, '$usuario_nome', '$usuario_email', '$usuario_senha',  '$usuario_telefone', 'defaultuser.png', '$usuario_cpf', '$usuario_cep', '$usuario_estado', '$usuario_cidade', '$usuario_bairro', '$usuario_endereco', '$usuario_numero', '$usuario_complemento', '$usuario_adm');";

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        header("Location: form-adicionar.php?cadastro=ok");
        exit;
    } else {
        header("Location: form-adicionar.php?cadastro=erro");
        exit;
    }

}


?>