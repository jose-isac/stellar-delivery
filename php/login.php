<?php
include('banco.php');

$usuario_email = $_POST['usuario_email'];
$usuario_senha = $_POST['usuario_senha'];

$sql = "SELECT * FROM tb_usuarios WHERE usuario_email = '$usuario_email' AND usuario_senha = '$usuario_senha'";

$resultado = $conexao_banco->query($sql);

if($resultado->num_rows > 0){
    $linha_tabela = $resultado->fetch_array(MYSQLI_ASSOC);
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
    $_SESSION['usuario_cidade'] = $linha_tabela['usuario_estado'];
    $_SESSION['usuario_bairro'] = $linha_tabela['usuario_bairro'];
    $_SESSION['usuario_endereco'] = $linha_tabela['usuario_endereco'];
    $_SESSION['usuario_numero'] = $linha_tabela['usuario_numero'];
    $_SESSION['usuario_complemento'] = $linha_tabela['usuario_complemento'];

    $usuario_logado = $_SESSION['usuario'];

    header("Location: ../index.php?login=ok&usuario='$usuario_logado'");
    exit;
}else {
    header("Location: ../index.php?login=erro");
    exit;
}
?>