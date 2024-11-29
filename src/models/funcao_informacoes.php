<?php
include_once("../../config/db.php");

$selectedMaterial = $_POST['material'];

if ($selectedMaterial === "Selecionar Produto") {
    echo "Selecione o produto que se deseja retirar";
} else {
    try {
        // Preparar a consulta SQL
        $sql = "SELECT E.Validade, P.Local, E.QuantidadeRestante 
                FROM Entrada AS E
                JOIN Produto AS P
                ON E.Produto_id = P.Produto_Id
                WHERE P.Nome = :material AND E.QuantidadeRestante > 0 
                ORDER BY E.Validade ASC 
                LIMIT 1";
        $stmt = $pdo->prepare($sql);
        
        // Associar o parâmetro
        $stmt->bindParam(':material', $selectedMaterial, PDO::PARAM_STR);
        
        // Executar a consulta
        $stmt->execute();
        
        // Verificar se há resultados
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            echo 'Validade: ' . date('d/m/Y', strtotime($row['Validade'])) . ' | Local: ' . $row['Local'] . ' | Estoque: ' . $row['QuantidadeRestante'];
        } else {
            echo "Material sem estoque.";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }

    // Fechar a conexão (opcional, já que o script encerra a execução)
    $pdo = null;
}
?>
