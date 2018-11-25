<?php
require_once('selecionarDados.php');

setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$diaEntrada = strftime('%d');
$mesEntrada = strftime('%m-%b');
$anoEntrada = strftime('%G');
$horarioEntrada = strftime('%T');

if (empty($_POST['id']))
{
    $id = NULL;
} else {
    $id = $_POST['id'];
}
$dados = carregarDados($conexao, $id);

if ($dados != null) {
    $RA = $dados['RA'];
    $status = $dados['status'];
    $ano = $dados['ano'];
    $mes = $dados['mes'];
    $dia = $dados['dia'];
    $horario = $dados['horario'];
    $imagem = $dados['foto'];
    if (inserirFrenquencia($conexao, $RA, $id)) {

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
    $responseError = [
    'ra' => '404',
    'cadastrou' => false,
    'id' => $id,
    ];
    echo json_encode($responseError);
    http_response_code(404);
    die;

?>