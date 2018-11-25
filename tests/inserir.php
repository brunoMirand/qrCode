<?php 
require_once('../model/selecionarDados.php');

// $validaRA = $_POST["id"];
// $tipo = gettype($validaRA);
// print $tipo + "\n";
// echo $validaRA + "\n";

// $RA = carregarDados($conexao);
// print_r($RA) + "\n";
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
$dia = strftime('%d-%A-');
echo "\n";
$mesEntrada = strftime('%m-%b');
echo "\n";
$anoEntrada = strftime('%G-');
echo "\n";
$horaEntrada = strftime('%R-');
echo $horaEntrada;
echo $anoEntrada;
echo $dia;
echo $mesEntrada;
die;

foreach ($RA as $RAs) {
    if (in_array($validaRA, $RAs)) {
        echo " -------------TEM----------";
        header('Location: form.html');
    } else { 
        echo " NÃO TEM\n";
    }
}
die;

foreach ($RA as $RAs) {
    if (array_search($validaRA, $RAs)) {
        echo " TEM\n";
        header('Location: form.html');
    } else { 
        echo " NÃO TEM\n";
    }
}
die;

foreach ($RA as $RAs) {
    if ($validaRA == $RAs['RA']) {
        echo "TOP\n";
        header('Location: form.html');
    } else {
        echo "ERROOOOR\n";
    }

}

?>
