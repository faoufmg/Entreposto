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

$Nome = isset($_POST['SeletorProduto']) ? sanitizeInput($_POST['SeletorProduto']) : NULL;
$QuantidadeDemanda = isset($_POST['Quantidade']) ? sanitizeInt($_POST['Quantidade']) : NULL;
$Destino = isset($_POST['SeletorDestino']) ? sanitizeInput($_POST['SeletorDestino']) : NULL;
$Observacao = isset($_POST['Observacao']) ? sanitizeInput($_POST['Observacao']) : NULL;

date_default_timezone_set('America/Sao_Paulo');
$DataDemanda = date('Y-m-d H:i:s');
$Usuario = htmlspecialchars($_SESSION["nome_cadastro"], ENT_QUOTES, 'UTF-8');

try {

    if (empty($Nome) || empty($QuantidadeDemanda) || empty($Destino)) {
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
            VALUES ('Demanda', :DataMovimentacao)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':DataMovimentacao', $DataDemanda, PDO::PARAM_STR);
    $stmt->execute();

    $MovimentacaoDatas_id = $pdo->lastInsertId();

    // Insere na tabela Demanda
    $query = "INSERT INTO Demanda (Produto_id, Destino, Quantidade, Observacao, Usuario, MovimentacaoDatas_id)
              VALUES (:Produto_id, :Destino, :Quantidade, :Observacao, :Usuario, :MovimentacaoDatas_id)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);
    $stmt->bindParam(':Destino', $Destino, PDO::PARAM_STR);
    $stmt->bindParam(':Quantidade', $QuantidadeDemanda, PDO::PARAM_INT);
    $stmt->bindParam(':Observacao', $Observacao, PDO::PARAM_STR);
    $stmt->bindParam(':Usuario', $Usuario, PDO::PARAM_STR);
    $stmt->bindParam(':MovimentacaoDatas_id', $MovimentacaoDatas_id, PDO::PARAM_INT);
    $stmt->execute();

    echo "<script>
            alert('Demanda cadastrada com sucesso.');
            window.location.href = '../pages/demanda.php';
          </script>";

} catch (Exception $e) {
    echo
    "<script>
        alert('" . $e->getMessage() . "');
        window.location.href = '../pages/demanda.php';
    </script>";
}
