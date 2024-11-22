<?php
include_once('../conn/db.php');

$selectedMaterial = $_POST['material'];

$sql = "SELECT Codigo FROM Entrada WHERE Nome = ?";
$stmt = $link->prepare($sql);
$stmt->bind_param('s', $selectedMaterial);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row['Codigo'];
} 

$stmt->close();
$link->close();
?>
