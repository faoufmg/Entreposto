<?php
include_once("../../config/db.php");

$selectedMaterial = $_POST['material'];

$sql = "SELECT Validade, Local, Quantidade FROM Entrada WHERE Nome = ? AND Quantidade > 0 ORDER BY Validade ASC LIMIT 1";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $selectedMaterial);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo 'Validade: ' . date('d/m/Y', strtotime($row['Validade'])) . ' | Local: ' . $row['Local'] . ' | Estoque: ' . $row['Quantidade'];
} else {
  echo "Material sem estoque.";
}

$stmt->close();
$conn->close();
?>