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
        $ano = $ids['ano'];
        $mes = $ids['mes'];
        $dia = $ids['dia'];
        $horario = $ids['horario'];
        $imagem = $ids['foto'];
        if (inserirFrenquencia($conexao, $RA, $id)) {
            $data = carregarData($conexao, $id);
            foreach ($data as $datas) {
                $anoEntrada = $datas['anoEntrada'];
                $mesEntrada = $datas['mesEntrada'];
                $diaEntrada = $datas['diaEntrada'];
                $horarioEntrada = $datas['horarioEntrada'];
            }
            $response = [
                'id' => $id,
                'ra' => $RA,
                'status' => $status,
                'dataAnterior' => [
                    'ano' => $ano,
                    'mes' => $mes,
                    'dia' => $dia,
                    'horario' => $horario,
                ],
                'dataEntrada' => [
                    'ano' => $anoEntrada,
                    'mes' => $mesEntrada,
                    'dia' => $diaEntrada,
                    'horario' => $horarioEntrada,
                ],
                'imagem' => $imagem,
            ];
            echo json_encode($response);
            http_response_code(200);
            die;
        } else {
             echo json_encode(['cadastrou' => false]);
        }

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