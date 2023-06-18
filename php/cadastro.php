<?php
include('banco.php');

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

// Se receber a foto de perfil:

if (isset($_FILES["fotoPerfil"]) && $_FILES["fotoPerfil"]["error"] == 0) {
    
    $fotoNome = $_FILES['fotoPerfil']['name'];
    $fotoTmp = $_FILES['fotoPerfil']['tmp_name'];

    $usuario_foto = $fotoNome;

    move_uploaded_file($fotoTmp, "user_images/" . $fotoNome);

    $sql = "INSERT INTO tb_usuarios VALUES(null, '$usuario_nome', '$usuario_email', '$usuario_senha',  '$usuario_telefone', '$usuario_foto', '$usuario_cpf', '$usuario_cep', '$usuario_estado', '$usuario_cidade', '$usuario_bairro', '$usuario_endereco', '$usuario_numero', '$usuario_complemento');";

    $resultado = $conexao_banco->query($sql);

    if ($resultado) {

        $sql2 = "SELECT * FROM tb_usuarios WHERE usuario_email = '$usuario_email' and usuario_senha = '$usuario_senha'";

        $resultado2 = $conexao_banco->query($sql2);

        if ($resultado2->num_rows > 0) {
            $linha_tabela = $resultado2->fetch_array(MYSQLI_ASSOC);
            session_start();

            $_SESSION['login'] = 'ok';
            $_SESSION['usuario'] = $linha_tabela['usuario_id'];
            $_SESSION['usuario_nome'] = $linha_tabela['usuario_nome'];
            $_SESSION['usuario_email'] = $linha_tabela['usuario_email'];
            $_SESSION['usuario_senha'] = $linha_tabela['usuario_senha'];
            $_SESSION['usuario_telefone'] = $linha_tabela['usuario_telefone'];
            $_SESSION['usuario_cpf'] = $linha_tabela['usuario_cpf'];
            $_SESSION['usuario_cep'] = $linha_tabela['usuario_cep'];
            $_SESSION['usuario_estado'] = $linha_tabela['usuario_estado'];
            $_SESSION['usuario_cidade'] = $linha_tabela['usuario_cidade'];
            $_SESSION['usuario_bairro'] = $linha_tabela['usuario_bairro'];
            $_SESSION['usuario_endereco'] = $linha_tabela['usuario_endereco'];
            $_SESSION['usuario_numero'] = $linha_tabela['usuario_numero'];
            $_SESSION['usuario_complemento'] = $linha_tabela['usuario_complemento'];
            $_SESSION['usuario_foto'] = $linha_tabela['usuario_foto'];

            $_SESSION['usuario_localizacao'] = $_SESSION['usuario_numero'] . ", " . $_SESSION['usuario_endereco'] . ", " . $_SESSION['usuario_bairro'] . ", " . $_SESSION['usuario_cidade'] . ", " . $_SESSION['usuario_estado'];

            $usuario_logado = $_SESSION['usuario'];

            header("Location: ../index.php?login=ok&usuario='$usuario_logado'");
            exit;
        }

    }

} elseif(!isset($_FILES["fotoPerfil"]) || $_FILES["fotoPerfil"]["error"] != 0) {
    $sql = "INSERT INTO tb_usuarios VALUES(null, '$usuario_nome', '$usuario_email', '$usuario_senha',  '$usuario_telefone','','$usuario_cpf', '$usuario_cep', '$usuario_estado', '$usuario_cidade', '$usuario_bairro', '$usuario_endereco', '$usuario_numero', '$usuario_complemento');";

    $resultado = $conexao_banco->query($sql);
    if ($resultado) {

        $sql2 = "SELECT * FROM tb_usuarios WHERE usuario_email = '$usuario_email' and usuario_senha = '$usuario_senha'";

        $resultado2 = $conexao_banco->query($sql2);

        if ($resultado2->num_rows > 0) {
            $linha_tabela = $resultado2->fetch_array(MYSQLI_ASSOC);
            session_start();

            $_SESSION['login'] = 'ok';
            $_SESSION['usuario'] = $linha_tabela['usuario_id'];
            $_SESSION['usuario_nome'] = $linha_tabela['usuario_nome'];
            $_SESSION['usuario_email'] = $linha_tabela['usuario_email'];
            $_SESSION['usuario_senha'] = $linha_tabela['usuario_senha'];
            $_SESSION['usuario_telefone'] = $linha_tabela['usuario_telefone'];
            $_SESSION['usuario_cpf'] = $linha_tabela['usuario_cpf'];
            $_SESSION['usuario_cep'] = $linha_tabela['usuario_cep'];
            $_SESSION['usuario_estado'] = $linha_tabela['usuario_estado'];
            $_SESSION['usuario_cidade'] = $linha_tabela['usuario_cidade'];
            $_SESSION['usuario_bairro'] = $linha_tabela['usuario_bairro'];
            $_SESSION['usuario_endereco'] = $linha_tabela['usuario_endereco'];
            $_SESSION['usuario_numero'] = $linha_tabela['usuario_numero'];
            $_SESSION['usuario_complemento'] = $linha_tabela['usuario_complemento'];
            $_SESSION['usuario_foto'] = 'defaultuser.png';

            $_SESSION['usuario_localizacao'] = $_SESSION['usuario_numero'] . ", " . $_SESSION['usuario_endereco'] . ", " . $_SESSION['usuario_bairro'] . ", " . $_SESSION['usuario_cidade'] . ", " . $_SESSION['usuario_estado'];

            $usuario_logado = $_SESSION['usuario'];

            header("Location: ../index.php?login=ok&usuario='$usuario_logado'");
            exit;
        }

    }
}



?>