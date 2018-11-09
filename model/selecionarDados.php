<?php
$conexao = mysqli_connect("localhost", "bruno", "", "evasao");

function carregarDados($conexao)
{
    $RAs = array();
    $query = 'SELECT A.id, A.RA, status, data_entrada AS data FROM alunos AS A INNER JOIN matricula AS M ON A.matricula_id = M.id
                INNER JOIN frequencia AS F ON A.id = F.alunos_id ORDER BY data DESC';
    $resultado = mysqli_query($conexao, $query);
    while ($RA = mysqli_fetch_assoc($resultado))
    {
        $RAs[] = $RA;
    }
    return $RAs;
}

function carregarData($conexao, $id)
{
    $datas = array();
    $query = "SELECT data_entrada AS saida FROM alunos AS A LEFT JOIN frequencia AS F ON A.RA = F.RA
                INNER JOIN matricula AS M ON A.matricula_id = M.id WHERE A.id = '{$id}' ORDER BY saida ASC";
    $resultado = mysqli_query($conexao, $query);
    while ($data = mysqli_fetch_assoc($resultado))
    {
        $datas[] = $data;
    }
    return $datas;
}

function inserirFrenquencia($conexao, $RA, $id)
{
    $query = "INSERT INTO frequencia(RA, alunos_id)VALUES('{$RA}', $id)";
    return mysqli_query($conexao, $query);

}

?>