<?php
$conexao = mysqli_connect("localhost", "bruno", "", "evasao");

function carregarDados($conexao, $id)
{
    $query = "SELECT A.id, A.RA, A.foto, status, YEAR(data_entrada) AS ano, MONTH(data_entrada) AS mes, DAY(data_entrada) AS dia, TIME(data_entrada) AS horario FROM alunos AS A
                INNER JOIN matricula AS M ON A.matricula_id = M.id LEFT JOIN frequencia AS F ON A.id = F.alunos_id WHERE A.id = '{$id}' ORDER BY dia DESC, horario DESC";
    $resultado = mysqli_query($conexao, $query);
    $dados = mysqli_fetch_assoc($resultado);
    return $dados;
}

function inserirFrenquencia($conexao, $RA, $id)
{
    $query = "INSERT INTO frequencia(RA, alunos_id)VALUES('{$RA}', $id)";
    return mysqli_query($conexao, $query);

}

?>