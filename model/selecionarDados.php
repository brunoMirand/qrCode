<?php
$conexao = mysqli_connect("localhost", "bruno", "", "evasao");

function carregarRA($conexao)
{
    $RAs = array();
    $query = 'SELECT RA FROM alunos';
    $resultado = mysqli_query($conexao, $query);
    while ($RA = mysqli_fetch_assoc($resultado))
    {
        $RAs[] = $RA;
    }
    return $RAs;
}

function inserirFrenquencia($conexao, $RA)
{
    $query = "INSERT INTO frequencia(RA)VALUES('{$RA}')";
    return mysqli_query($conexao, $query);

}
?>