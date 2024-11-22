<?php

include_once('../Funcoes/Verifica.php');
include_once('../conn/db.php');

$Nome = mb_strtoupper($_POST['SeletorProduto'], 'UTF-8');
$Destino = $_POST['SeletorDestino'];
$Observacao = $_POST['Observacao'];
$Quantidade = $_POST['Quantidade'];
date_default_timezone_set('America/Sao_Paulo');
$DataDemanda = date('Y-m-d H:i:s');
$Usuario = $_SESSION["nome_cadastro"];

$stmt = mysqli_prepare($link, "INSERT INTO Demanda(Nome, Destino, Observacao, Quantidade, DataDemanda, Usuario) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'sssiss', $Nome, $Destino, $Observacao, $Quantidade, $DataDemanda, $Usuario);

if (mysqli_stmt_execute($stmt)) {
    echo
    "<script>
        alert('Demanda registrada com sucesso!');
        window.location.href = '../Home/Demanda.php';
    </script>";
} else {
    echo "Erro na consulta: " . mysqli_error($link);
}

mysqli_stmt_close($stmt);

?>