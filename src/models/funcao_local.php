<?php
include_once("../../config/db.php");

$selectedMaterial = $_POST['material'];

try {

    // Consulta preparada para evitar injeção de SQL
    $sql = "SELECT Local FROM Produto WHERE Nome = :material";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':material', $selectedMaterial, PDO::PARAM_STR);
    $stmt->execute();

    // Verifica se há resultados
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $row['Local'];
    }

} catch (PDOException $e) {
    // Tratamento de erros
    echo "Erro ao acessar o banco de dados: " . $e->getMessage();
}
?>
