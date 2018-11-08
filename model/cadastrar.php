<?php
require_once('selecionarDados.php');

if (empty($_POST['id']))
{
    $id = NULL;
} else {
    $id = $_POST['id'];
}
$dados = carregarDados($conexao);

foreach ($dados as $ids) {
    if (in_array($id, $ids)) {
        $RA = $ids['RA'];
        if (inserirFrenquencia($conexao, $RA, $id)) {
            echo json_encode(['cadastrou' => true]);
        } else {
            echo json_encode(['cadastrou' => false]);
        }
        $response = [
            'id' => $id,
            'ra' => $RA,
        ];
        echo json_encode($response);
        http_response_code(200);
        die;
    }
}
    $responseError = [
    'ra' => '404',
    'cadastrou' => false,
    'id' => $id,
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