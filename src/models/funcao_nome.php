<?php
include_once("../../config/db.php");

$selectedMaterial = $_POST['material'];

$sql = "SELECT Nome FROM Entrada WHERE Nome = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $selectedMaterial);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row['Nome'];
}

$stmt->close();
$conn->close();
?>