<?php
$conexao = mysqli_connect("localhost", "bruno", "", "evasao");

function carregarDados($conexao)
{
    $RAs = array();
    $query = 'SELECT id, RA FROM alunos';
    $resultado = mysqli_query($conexao, $query);
    while ($RA = mysqli_fetch_assoc($resultado))
    {
        $RAs[] = $RA;
    }
    return $RAs;
}

function inserirFrenquencia($conexao, $RA, $id)
{
    $query = "INSERT INTO frequencia(RA, alunos_id)VALUES('{$RA}', $id)";
    return mysqli_query($conexao, $query);

}
?>