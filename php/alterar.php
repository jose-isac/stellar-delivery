<?php 
include('banco.php');
include('sessao.php');

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
$usuario_endereco = $_POST['usuario_endereco'];
$usuario_numero = $_POST['usuario_numero'];
$usuario_complemento = $_POST['usuario_complemento'];

// Se receber a foto do perfil 

if (isset($_FILES["fotoPerfil"]) && $_FILES["fotoPerfil"]["error"] == 0) {
    
    $fotoNome = $_FILES['fotoPerfil']['name'];
    $fotoTmp = $_FILES['fotoPerfil']['tmp_name'];

    $usuario_foto = $fotoNome;

    move_uploaded_file($fotoTmp, "user_images/" . $fotoNome);

    $sql = "UPDATE tb_usuarios SET usuario_nome = '$usuario_nome', usuario_email = '$usuario_email', usuario_senha = '$usuario_senha', usuario_telefone = '$usuario_telefone', usuario_foto = '$usuario_foto', usuario_cpf = '$usuario_cpf', usuario_cep = '$usuario_cep', usuario_estado = '$usuario_estado', usuario_cidade = '$usuario_cidade', usuario_bairro = '$usuario_bairro', usuario_endereco = '$usuario_endereco', usuario_numero = '$usuario_numero', usuario_complemento = '$usuario_complemento' WHERE usuario_id = " . $_SESSION['usuario'];

    $resultado = $conexao_banco->query($sql);

    if ($resultado){

        $_SESSION['usuario_nome'] = $usuario_nome;
        $_SESSION['usuario_email'] = $usuario_email;
        $_SESSION['usuario_senha'] = $usuario_senha;
        $_SESSION['usuario_telefone'] = $usuario_telefone;
        $_SESSION['usuario_cpf'] = $usuario_cpf;
        $_SESSION['usuario_cep'] = $usuario_cep;
        $_SESSION['usuario_estado'] = $usuario_estado;
        $_SESSION['usuario_cidade'] = $usuario_cidade;
        $_SESSION['usuario_bairro'] = $usuario_bairro;
        $_SESSION['usuario_endereco'] = $usuario_endereco;
        $_SESSION['usuario_numero'] = $usuario_numero;
        $_SESSION['usuario_complemento'] = $usuario_complemento;
        $_SESSION['usuario_foto'] = $usuario_foto;
        header("Location: ../alterarPerfil.php?alteracao=ok");
    } else {
        header("Location: ../alterarPerfil.php?alteracao=erro");
    }

} else {

    $sql = "UPDATE tb_usuarios SET usuario_nome = '$usuario_nome', usuario_email = '$usuario_email', usuario_senha = '$usuario_senha', usuario_telefone = '$usuario_telefone', usuario_cpf = '$usuario_cpf', usuario_cep = '$usuario_cep', usuario_estado = '$usuario_estado', usuario_cidade = '$usuario_cidade', usuario_bairro = '$usuario_bairro', usuario_endereco = '$usuario_endereco', usuario_numero = '$usuario_numero', usuario_complemento = '$usuario_complemento' WHERE usuario_id = " . $_SESSION['usuario'];

    $resultado = $conexao_banco->query($sql);

    if ($resultado){
        $_SESSION['usuario_nome'] = $usuario_nome;
        $_SESSION['usuario_email'] = $usuario_email;
        $_SESSION['usuario_senha'] = $usuario_senha;
        $_SESSION['usuario_telefone'] = $usuario_telefone;
        $_SESSION['usuario_cpf'] = $usuario_cpf;
        $_SESSION['usuario_cep'] = $usuario_cep;
        $_SESSION['usuario_estado'] = $usuario_estado;
        $_SESSION['usuario_cidade'] = $usuario_cidade;
        $_SESSION['usuario_bairro'] = $usuario_bairro;
        $_SESSION['usuario_endereco'] = $usuario_endereco;
        $_SESSION['usuario_numero'] = $usuario_numero;
        $_SESSION['usuario_complemento'] = $usuario_complemento;
        header("Location: ../alterarPerfil.php?alteracao=ok");
    } else {
        header("Location: ../alterarPerfil.php?alteracao=erro");
    }

}

?>