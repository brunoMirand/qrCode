<?php

//$dados = $_POST['ra'];

$valido = true;

if (!$valido) {
    http_response_code(404);
    die;
}

if ($valido) {
    $response = [
        'id'  => 1,
        'nome' => 'Barreto',
        'holaaaa' => [
            'a',
            'b'
        ],
        'email' => 'barreto_monstro@catho.com'
    ];
    echo json_encode($response);
}

http_response_code(200);
die;


?>