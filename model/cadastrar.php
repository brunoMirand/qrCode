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
        $status = $ids['status'];
        $dataEntrada = $ids['data'];
        if (inserirFrenquencia($conexao, $RA, $id)) {
            $data = carregarData($conexao, $id);
            foreach ($data as $datas) {
                $dataSaida = $datas['saida'];
            }
            $response = [
                'id' => $id,
                'ra' => $RA,
                'status' => $status,
                'dataEntrada' => $dataEntrada,
                'dataSaida' => $dataSaida,
                'imagem' => 'img/bruno.png',
            ];
            echo json_encode($response);
            http_response_code(200);
            //die;

        } else {
            echo json_encode(['cadastrou' => false]);
        }
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

?>