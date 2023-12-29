<?php

$host = "192.168.0.14";
$username = "arthur";
$password = "Marlon@87";
$database = "arthur";

$conexao = new mysqli($host, $username, $password, $database);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conexao->connect_error);
}
?>