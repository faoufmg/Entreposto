<?php

include_once('../Funcoes/Verifica.php');
include_once('../conn/db.php');

$Nome = mb_strtoupper($_POST['SeletorProduto'], 'UTF-8');
$Destino = $_POST['SeletorDestino'];
$Observacao = $_POST['Observacao'];
$Quantidade = $_POST['Quantidade'];
date_default_timezone_set('America/Sao_Paulo');
$DataSaida = date('Y-m-d H:i:s');
$Movimentacao = 'Saída';
$Usuario = $_SESSION["nome_cadastro"];

$ValidadeResult = mysqli_query($link, "SELECT Validade, Local FROM Entrada WHERE Nome = '$Nome' AND Quantidade > 0 ORDER BY Validade ASC LIMIT 1");
$ValidadeRow = mysqli_fetch_assoc($ValidadeResult);
$Validade = date_format(date_create($ValidadeRow['Validade']), 'd/m/Y');
$Local = $ValidadeRow['Local'];

$QuantidadeEstoqueResult = mysqli_query($link, "SELECT Quantidade FROM Entrada WHERE Nome = '$Nome' AND Quantidade > 0 GROUP BY Validade ORDER BY Validade ASC");
$QuantidadeEstoqueRow = mysqli_fetch_assoc($QuantidadeEstoqueResult);
$QuantidadeEstoque = $QuantidadeEstoqueRow['Quantidade'];

$QuantidadeRestante = $QuantidadeEstoque - $Quantidade;

$QuantidadeTotalResult = mysqli_query($link, "SELECT SUM(Quantidade) AS QuantidadeTotal FROM Entrada WHERE Nome = '$Nome'");
$QuantidadeTotalRow = mysqli_fetch_assoc($QuantidadeTotalResult);
$QuantidadeTotal = $QuantidadeTotalRow['QuantidadeTotal'];

if ($QuantidadeTotal == 0) {
    echo
    "<script>
        alert('Material sem estoque. Faça um pedido de demanda.');
        window.location.href = '../Home/Demanda.php';
    </script>";
} 

else {
    $stmt = mysqli_prepare($link, "INSERT INTO Saida(Nome, Destino, Observacao, Quantidade, DataSaida, Movimentacao, Validade, Local, Usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'sssisssss', $Nome, $Destino, $Observacao, $Quantidade, $DataSaida, $Movimentacao, $ValidadeRow['Validade'], $Local, $Usuario);

    mysqli_query($link, "UPDATE Entrada SET Quantidade = '$QuantidadeRestante' WHERE Nome = '$Nome' AND Quantidade > 0 ORDER BY Validade ASC LIMIT 1");

    if (mysqli_stmt_execute($stmt)) {
        echo
        "<script>
            alert('Produto retirado com sucesso!');
            window.location.href = '../Home/Saida.php';
        </script>";
    } else {
        echo "Erro na consulta: " . mysqli_error($link);
    }
}

mysqli_stmt_close($stmt);

?>