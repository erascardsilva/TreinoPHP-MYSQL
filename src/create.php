<?php
header('Content-Type: application/json');
include 'db.php';

// Verificar se os dados foram enviados via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $senha = $_POST['senha'];

    // Validação simples dos dados
    if (empty($name) || empty($senha)) {
        echo json_encode(array('status' => 'error', 'message' => 'Nome e senha são obrigatórios.'));
        exit();
    }

    // Preparar e executar a query
    $stmt = $conn->prepare("INSERT INTO users (name, senha) VALUES (?, ?)");

    // Verificar se a preparação da query foi bem-sucedida
    if ($stmt === false) {
        echo json_encode(array('status' => 'error', 'message' => 'Erro ao preparar a consulta: ' . $conn->error));
        exit();
    }

    $stmt->bind_param("ss", $name, $senha);

    if ($stmt->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'Novo registro criado com sucesso'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Erro ao criar registro: ' . $stmt->error));
    }

    $stmt->close(); // Fechar após o uso
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Método de requisição inválido.'));
}
