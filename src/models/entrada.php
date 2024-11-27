<?php

include_once("../../config/db.php");
include_once("verifica.php");

function sanitizeInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function sanitizeInt($data)
{
    return filter_var($data, FILTER_VALIDATE_INT);
}

if (!isset($_SESSION["nome_cadastro"])) {
    echo "<script>
            alert('Erro: Usuário não autenticado.');
            window.location.href = '../login.php';
          </script>";
    exit();
}

$Nome = isset($_POST['material']) ? sanitizeInput($_POST['material']) : NULL;
$Validade = isset($_POST['data_validade']) ? sanitizeInput($_POST['data_validade']) : NULL;
$Quantidade = isset($_POST['quantidade']) ? sanitizeInt($_POST['quantidade']) : NULL;

date_default_timezone_set('America/Sao_Paulo');
$DataCad = date('Y-m-d H:i:s');

$Usuario = $_SESSION["nome_cadastro"];

try {
    if (!$Nome) {
        throw new Exception("Erro: Nome não fornecido.");
    }

    // Buscar Produto_id
    $query = "SELECT Produto_id FROM Produto WHERE Nome = :Nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Nome', $Nome, PDO::PARAM_STR);
    $stmt->execute();
    $Produto_id = $stmt->fetchColumn();

    if (!$Produto_id) {
        throw new Exception("Erro: Produto não encontrado.");
    }

    // Validar data de validade
    if ($Validade && !DateTime::createFromFormat('Y-m-d', $Validade)) {
        throw new Exception("Erro: Data de validade inválida.");
    }

    $Validade = $Validade ?: NULL;

    // Verificar entrada existente
    $query = "SELECT Entrada_id, QuantidadeEntrou, QuantidadeRestante 
              FROM Entrada 
              WHERE Produto_id = :Produto_id AND (Validade = :Validade OR (:Validade IS NULL AND Validade IS NULL))";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);
    $stmt->bindParam(':Validade', $Validade, PDO::PARAM_STR);
    $stmt->execute();
    $entradaExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($entradaExistente) {
        // Atualizar entrada existente
        $novaQuantidade = $entradaExistente['QuantidadeEntrou'] + $Quantidade;
        $novoRestante = $entradaExistente['QuantidadeRestante'] + $Quantidade;

        $query = "UPDATE Entrada 
                  SET QuantidadeEntrou = :novaQuantidade, QuantidadeRestante = :novoRestante, DataCad = :DataCad, Usuario = :Usuario 
                  WHERE Entrada_id = :Entrada_id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':novaQuantidade', $novaQuantidade, PDO::PARAM_INT);
        $stmt->bindParam(':novoRestante', $novoRestante, PDO::PARAM_INT);
        $stmt->bindParam(':DataCad', $DataCad, PDO::PARAM_STR);
        $stmt->bindParam(':Usuario', $Usuario, PDO::PARAM_STR);
        $stmt->bindParam(':Entrada_id', $entradaExistente['Entrada_id'], PDO::PARAM_INT);
        $stmt->execute();

        // Inserir em DataCadastro
        $queryInsercaoData = "INSERT INTO DataCadastro (Entrada_id, Data) VALUES (:Entrada_id, :Data)";
        $stmt = $pdo->prepare($queryInsercaoData);
        $stmt->bindParam(':Entrada_id', $entradaExistente['Entrada_id'], PDO::PARAM_INT);
        $stmt->bindParam(':Data', $DataCad, PDO::PARAM_STR);
        $stmt->execute();

        echo "<script>
                alert('Entrada cadastrada com sucesso.');
                window.location.href = '../pages/entrada.php';
              </script>";
    } else {
        throw new Exception("Erro: Nenhuma entrada encontrada para atualizar.");
    }
} catch (Exception $e) {
    echo "<script>
            alert('" . $e->getMessage() . "');
            window.location.href = '../pages/entrada.php';
          </script>";
}
?>
