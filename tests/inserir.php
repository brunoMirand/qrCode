<?php 
require_once('../model/selecionarDados.php');

$validaRA = $_POST["id"];
$tipo = gettype($validaRA);
print $tipo + "\n";
echo $validaRA + "\n";

$RA = carregarDados($conexao);
print_r($RA) + "\n";


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
