<?php

include_once("../../config/db.php");
include_once("verifica.php");

function sanitizeInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function sanitizeInt($data)
{
    $int = filter_var($data, FILTER_VALIDATE_INT);
    return $int === false ? null : $int;
}

$Nome = isset($_POST['SeletorRetirada']) ? sanitizeInput($_POST['SeletorRetirada']) : NULL;
$QuantidadeSaiu = isset($_POST['Quantidade']) ? sanitizeInt($_POST['Quantidade']) : NULL;
$Destino = isset($_POST['Destino']) ? sanitizeInput($_POST['Destino']) : NULL;
$Observacao = isset($_POST['Observacao']) ? sanitizeInput($_POST['Observacao']) : NULL;

date_default_timezone_set('America/Sao_Paulo');
$DataSaida = date('Y-m-d H:i:s'); // Data de cadastro
$Usuario = htmlspecialchars($_SESSION["nome_cadastro"], ENT_QUOTES, 'UTF-8');

try {

    if (empty($Nome) || empty($QuantidadeSaiu) || empty($Destino)) {
        throw new Exception("Todos os campos obrigatórios devem ser preenchidos.");
    }

    // Busca o ID do produto
    $query = "SELECT Produto_id FROM Produto WHERE Nome = :Nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Nome', $Nome, PDO::PARAM_STR);
    $stmt->execute();
    $Produto_id = $stmt->fetchColumn();

    // Insere na tabela MovimentacaoDatas
    $query = "INSERT INTO MovimentacaoDatas (OrigemMovimentacao, DataMovimentacao)
            VALUES ('Saída', :DataMovimentacao)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':DataMovimentacao', $DataSaida, PDO::PARAM_STR);
    $stmt->execute();

    $MovimentacaoDatas_id = $pdo->lastInsertId();

    $query = "INSERT INTO Saida (Produto_id, Destino, Observacao, QuantidadeSaiu, Usuario, MovimentacaoDatas_id)
              VALUES (:Produto_id, :Destino, :Observacao, :QuantidadeSaiu, :Usuario, :MovimentacaoDatas_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);
    $stmt->bindParam(':Destino', $Destino, PDO::PARAM_STR);
    $stmt->bindParam(':Observacao', $Observacao, PDO::PARAM_STR);
    $stmt->bindParam(':QuantidadeSaiu', $QuantidadeSaiu, PDO::PARAM_INT);
    $stmt->bindParam(':Usuario', $Usuario, PDO::PARAM_STR);
    $stmt->bindParam(':MovimentacaoDatas_id', $MovimentacaoDatas_id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>
            alert('Saída cadastrada com sucesso.');
            window.location.href = '../pages/retirada.php';
          </script>";
} catch (Exception $e) {
    echo
    "<script>
        alert('" . $e->getMessage() . "');
        window.location.href = '../pages/retirada.php';
    </script>";
}
