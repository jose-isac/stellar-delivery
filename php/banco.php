<?php
// Conexão com o banco de dados

$hostname_conexao = "localhost";
$database_conexao = "db_stellardelivery";
$username_conexao = "root";
$password_conexao = "";

$conexao_banco = new mysqli($hostname_conexao, $username_conexao, $password_conexao, $database_conexao);

$conexao_banco->query("SET NAMES 'utf8'");
$conexao_banco->query('SET character_set_connection=utf8');//E
$conexao_banco->query('SET character_set_client=utf8');
$conexao_banco->query('SET character_set_results=utf8');

if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
echo mysqli_connect_error();


?>