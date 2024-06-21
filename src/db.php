<?php
$servername = "db";
$username = "erasmo";
$password = "3727";
$dbname = "acessphp";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificar se a tabela existe e criar se não existir
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL
)";

if ($conn->query($sql) === FALSE) {
    die("Erro ao criar/verificar tabela: " . $conn->error);
}

