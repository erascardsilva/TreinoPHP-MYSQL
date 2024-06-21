<?php
$servername = "db";
$username = "erasmo";
$password = "3727";
$dbname = "acessphp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo json_encode(array('status' => 'error', 'message' => 'Falha na conexão: ' . $conn->connect_error));
} else {
    echo json_encode(array('status' => 'success', 'message' => 'Conectado com sucesso ao banco de dados MYSQL!'));
}

// Fechar a conexão (opcional)
$conn->close();
