<?php
require_once('selecionarDados.php');

$validaRA = $_POST['ra'];
$RA = carregarRA($conexao);

foreach ($RA as $RAs) {
    if (in_array($validaRA, $RAs)) {
        if (inserirFrenquencia($conexao, $validaRA)) {
            echo json_encode(['cadastrou' => true]);
        } else {
            echo json_encode(['cadastrou' => false]);
        }
        $response = [
            'ra' => $validaRA,
        ];
        echo json_encode($response);
        http_response_code(200);
        die;
    }
}
    echo json_encode(["NAO CADASTROU" => '404']);
    echo json_encode(["RA" => $validaRA]);
    $responseError = [
        'ra' => '404',
    ];
    echo json_encode($responseError);
    http_response_code(404);
    die;




//$valido = true;
// if (!$valido) {
//     http_response_code(404);
//     die;
// }

// if ($valido) {
//     $response = [
//         'id'  => 1,
//         'nome' => 'Barreto',
//         'holaaaa' => [
//             'a',
//             'b'
//         ],
//         'email' => 'barreto_monstro@catho.com'
//     ];
//     echo json_encode($response);
// }

// http_response_code(200);
// die;


?>