<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

trigger_error("Este é um teste de erro.", E_USER_WARNING);

include_once("../../config/db.php");
include_once("verifica.php");

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function sanitizeInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

function sanitizeInt($data)
{
    return filter_var($data, FILTER_VALIDATE_INT);
}

// Verifica autenticação do usuário
if (!isset($_SESSION["nome_cadastro"])) {
    echo "<script>
            alert('Erro: Usuário não autenticado.');
            window.location.href = '../login.php';
          </script>";
    exit();
}

// Recebe os dados do formulário
$Nome = isset($_POST['material']) ? sanitizeInput($_POST['material']) : NULL;
$Validade = isset($_POST['data_validade']) ? sanitizeInput($_POST['data_validade']) : NULL;
$Quantidade = isset($_POST['quantidade']) ? sanitizeInt($_POST['quantidade']) : NULL;

if ($Quantidade === NULL || $Quantidade <= 0) {
    echo "<script>
            alert('Erro: Quantidade inválida ou não fornecida.');
            window.location.href = '../pages/entrada.php';
          </script>";
    exit();
}

date_default_timezone_set('America/Sao_Paulo');
$DataCad = date('Y-m-d H:i:s'); // Data de cadastro
$Usuario = htmlspecialchars($_SESSION["nome_cadastro"], ENT_QUOTES, 'UTF-8'); // Usuário autenticado

try {
    if (!$Nome) {
        throw new Exception("Erro: Nome não fornecido.");
    }

    // Busca o ID do produto
    $query = "SELECT Produto_id FROM Produto WHERE Nome = :Nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Nome', $Nome, PDO::PARAM_STR);
    $stmt->execute();
    $Produto_id = $stmt->fetchColumn();

    if (!$Produto_id) {
        throw new Exception("Erro: Produto não encontrado.");
    }

    // Valida a data de validade (se fornecida)
    $date = DateTime::createFromFormat('Y-m-d', $Validade);
    if ($Validade && (!$date || $date->format('Y-m-d') !== $Validade)) {
        throw new Exception("Erro: Data de validade inválida.");
    }

    $Validade = $Validade ?: NULL;

    // Verifica se já existe uma entrada para o mesmo produto e validade
    $query = "SELECT Entrada_id, QuantidadeEntrou, QuantidadeRestante 
              FROM Entrada 
              WHERE Produto_id = :Produto_id AND 
                    (Validade = :Validade OR (Validade IS NULL AND :Validade IS NULL))";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);
    $stmt->bindParam(':Validade', $Validade, PDO::PARAM_STR);
    $stmt->execute();
    $entradaExistente = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($entradaExistente) {
        // Atualiza a entrada existente
        // $novaQuantidade = $entradaExistente['Quantidade'] + $Quantidade;

        // $query = "UPDATE Entrada
        //           SET Quantidade = :novaQuantidade, Usuario = :Usuario 
        //           WHERE Entrada_id = :Entrada_id";
        // $stmt = $pdo->prepare($query);
        // $stmt->bindParam(':novaQuantidade', $novaQuantidade, PDO::PARAM_INT);
        // $stmt->bindParam(':Usuario', $Usuario, PDO::PARAM_STR);
        // $stmt->bindParam(':Entrada_id', $entradaExistente['Entrada_id'], PDO::PARAM_INT);
        // $stmt->execute();

        // // Atualiza a data na tabela MovimentacaoDatas
        // $query = "INSERT INTO MovimentacaoDatas (OrigemMovimentacao, Movimentacao_id, DataMovimentacao)
        //           VALUES ('Entrada', :Movimentacao_id, :DataMovimentacao)";
        // $stmt = $pdo->prepare($query);
        // $stmt->bindParam(':Movimentacao_id', $entradaExistente['Entrada_id'], PDO::PARAM_INT);
        // $stmt->bindParam(':DataMovimentacao', $DataCad, PDO::PARAM_STR);
        // $stmt->execute();

        echo "<script>
                alert('Entrada atualizada com sucesso.');
                window.location.href = '../pages/entrada.php';
              </script>";
    } else {

        // Insere na tabela MovimentacaoDatas
        $query = "INSERT INTO MovimentacaoDatas (OrigemMovimentacao, DataMovimentacao)
                  VALUES ('Entrada', :DataMovimentacao)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':DataMovimentacao', $DataCad, PDO::PARAM_STR);
        $stmt->execute();

        $MovimentacaoDatas_id = $pdo->lastInsertId();

        // Insere nova entrada
        $query = "INSERT INTO Entrada (Produto_id, Validade, QuantidadeEntrou, Usuario, QuantidadeRestante, MovimentacaoDatas_id)
                  VALUES (:Produto_id, :Validade, :QuantidadeEntrou, :Usuario, :QuantidadeRestante, :MovimentacaoDatas_id)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':Produto_id', $Produto_id, PDO::PARAM_INT);
        $stmt->bindParam(':Validade', $Validade, PDO::PARAM_STR);
        $stmt->bindParam(':QuantidadeEntrou', $Quantidade, PDO::PARAM_INT);
        $stmt->bindParam(':Usuario', $Usuario, PDO::PARAM_STR);
        $stmt->bindParam(':QuantidadeRestante', $Quantidade, PDO::PARAM_INT);
        $stmt->bindParam(':MovimentacaoDatas_id', $MovimentacaoDatas_id, PDO::PARAM_INT);
        $stmt->execute();

        echo "teste2";

        echo "teste3";

        echo "<script>
                alert('Entrada cadastrada com sucesso.');
                window.location.href = '../pages/entrada.php';
              </script>";
    }
} catch (Exception $e) {
    echo "<script>
            alert('" . $e->getMessage() . "');
            window.location.href = '../pages/entrada.php';
          </script>";
}
