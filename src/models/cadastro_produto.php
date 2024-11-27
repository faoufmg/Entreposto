<?php

include_once("../../config/db.php");
include_once("verifica.php");

function sanitizeInput($data)
{
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

// Recebendo os dados
$Nome = isset($_POST['Nome']) ? sanitizeInput($_POST['Nome']) : NULL;
$Nome = strtoupper($Nome);

$Descricao = isset($_POST['Descricao']) ? sanitizeInput($_POST['Descricao']) : NULL;
$Descricao = strtoupper($Descricao);

$Local = isset($_POST['Local']) ? sanitizeInput($_POST['Local']) : NULL;
$Local = strtoupper($Local);

$Codigo = isset($_POST['Codigo']) ? sanitizeInput($_POST['Codigo']) : NULL;
$QuantidadeTotal = 0;

try {
    // Validar campos obrigatórios
    if (empty($Nome) || empty($Descricao) || empty($Local) || empty($Codigo)) {
        throw new Exception("Todos os campos obrigatórios devem ser preenchidos.");
    }

    // Verificar se o produto já existe
    $query = "SELECT COUNT(*) FROM Produto WHERE Nome = :Nome";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Nome', $Nome, PDO::PARAM_STR);
    $stmt->execute();
    $produtoExistente = $stmt->fetchColumn();

    if ($produtoExistente) {
        throw new Exception("Produto já cadastrado.");
    }

    // Inserção no banco
    $query = "INSERT INTO Produto (Nome, Descricao, Local, Codigo, QuantidadeTotal)
              VALUES (:Nome, :Descricao, :Local, :Codigo, :QuantidadeTotal)";

    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':Nome', $Nome, PDO::PARAM_STR);
    $stmt->bindParam(':Descricao', $Descricao, PDO::PARAM_STR);
    $stmt->bindParam(':Local', $Local, PDO::PARAM_STR);
    $stmt->bindParam(':Codigo', $Codigo, PDO::PARAM_STR);
    $stmt->bindParam(':QuantidadeTotal', $QuantidadeTotal, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo
        "<script>
            alert('Produto cadastrado com sucesso.');
            window.location.href = '../pages/cadastro_produto.php';
        </script>";
    } else {
        throw new Exception("Erro: Ocorreu um problema ao cadastrar o produto.");
    }
} catch (Exception $e) {
    echo
    "<script>
        alert('" . $e->getMessage() . "');
        window.location.href = '../pages/cadastro_produto.php';
    </script>";
}
?>
