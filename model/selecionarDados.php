<?php
$conexao = mysqli_connect("localhost", "bruno", "", "evasao");

function carregarDados($conexao)
{
    $RAs = array();
    $query = 'SELECT A.id, A.RA, A.foto, status, YEAR(data_entrada) AS ano, MONTH(data_entrada) AS mes, DAY(data_entrada) AS dia, TIME(data_entrada) AS horario FROM alunos AS A
                INNER JOIN matricula AS M ON A.matricula_id = M.id LEFT JOIN frequencia AS F ON A.id = F.alunos_id ORDER BY dia DESC, horario DESC';
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
    $query = "SELECT nome, YEAR(data_entrada) AS anoEntrada, MONTH(data_entrada) AS mesEntrada, DAY(data_entrada) AS diaEntrada, TIME(data_entrada) AS horarioEntrada FROM alunos AS A
                LEFT JOIN frequencia AS F ON A.RA = F.RA INNER JOIN matricula AS M ON A.matricula_id = M.id
                    WHERE A.id = '{$id}' ORDER BY diaEntrada ASC, horarioEntrada ASC";
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