<?php
include('../banco.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

// Testar se a conta existe

$sql_conta = "SELECT * FROM tb_usuarios WHERE usuario_email = '$email' AND usuario_senha = '$senha' AND usuario_adm = 'S'";
$resultado_sql_conta = $conexao_banco->query($sql_conta);

if ($resultado_sql_conta->num_rows == 0) {
    header("Location: login-page.php?erro=conta-nao-encontrada");
    exit;
} else {
    $linha_tabela = $resultado_sql_conta->fetch_array(MYSQLI_ASSOC);
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
    $_SESSION['usuario_adm'] = $linha_tabela['usuario_adm'];

    $_SESSION['usuario_localizacao'] = $_SESSION['usuario_numero'] . ", " . $_SESSION['usuario_endereco'] . ", " . $_SESSION['usuario_bairro'] . ", " . $_SESSION['usuario_cidade'] . ", " . $_SESSION['usuario_estado'];

    $usuario_logado = $_SESSION['usuario'];

    header("Location: home-page.php?login=ok&usuario='$usuario_logado'");
}


?>