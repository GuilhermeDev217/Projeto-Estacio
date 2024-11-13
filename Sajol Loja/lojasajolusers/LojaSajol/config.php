<?php
// Configuração do banco de dados
$host = 'localhost'; // ou o endereço do seu servidor MySQL
$usuario = 'root';   // seu usuário do banco de dados
$senha = '';         // sua senha do banco de dados (deixe em branco se for o padrão 'root' sem senha)
$banco = 'lojasajolusers';  // o nome do seu banco de dados

// Criando a conexão com o banco de dados
$mysqli = new mysqli($host, $usuario, $senha, $banco);

// Verificando se a conexão foi bem-sucedida
if ($mysqli->connect_error) {
    die("Falha na conexão com o banco de dados: " . $mysqli->connect_error);
}
?>
