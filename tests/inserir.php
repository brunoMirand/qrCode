<?php 
require_once('../model/selecionarDados.php');

$validaRA = $_POST["ra"];
$tipo = gettype($validaRA);
print $tipo;
echo $validaRA;

$RA = carregarRA($conexao);
print_r($RA);

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
    if (in_array($validaRA, $RAs)) {
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
