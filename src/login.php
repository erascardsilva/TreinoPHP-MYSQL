<?php

include 'db.php';

$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['loginName'];
    $senha = $_POST['loginSenha'];

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $users = array();
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        $response['status'] = 'success';
        $response['message'] = 'Login realizado com sucesso!';
        $response['users'] = $users;
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Nenhum usuário encontrado.';
    }
} else {
    $response['status'] = 'error';
    $response['message'] = 'Request inválido.';     
}

header('Content-Type: application/json');
echo json_encode($response);

