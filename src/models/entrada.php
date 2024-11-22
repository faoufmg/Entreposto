<?php

  include_once('../Funcoes/Verifica.php');
  include_once('../conn/db.php');

  $Nome = mb_strtoupper($_POST['nome'], 'UTF-8');
  $NomeTratado = preg_replace('/\s+/', ' ', $Nome); // Tratamento do "Nome"
  $Codigo = $_POST['codigo'];
  $Validade = $_POST['data_validade'];
  date_default_timezone_set('America/Sao_Paulo');
  $DataCadastro = date('Y-m-d H:i:s');
  $Quantidade = $_POST['quantidade'];
  $Descricao = mb_strtoupper($_POST['descricao'], 'UTF-8');
  $DescricaoTratada = preg_replace('/\s+/', ' ', $Descricao); // Tratamento da "Descricao"
  $Local = mb_strtoupper($_POST['local'], 'UTF-8');
  $Movimentacao = 'Entrada';
  $Usuario = $_SESSION["nome_cadastro"];

  $stmt = mysqli_prepare($link, "SELECT * FROM Entrada WHERE Codigo = ? AND Validade = ? AND Nome = ?");
  mysqli_stmt_bind_param($stmt, 'sss', $Codigo, $Validade, $NomeTratado);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if(mysqli_num_rows($result) > 0){
    $stmt = mysqli_prepare($link, "UPDATE Entrada SET Quantidade = Quantidade + ?, QuantidadeInicial = QuantidadeInicial + ?, DataCad = ?, Usuario = ? WHERE Codigo = ? AND Validade = ? AND Nome = ?");
    mysqli_stmt_bind_param($stmt, 'iisssss', $Quantidade, $Quantidade, $DataCadastro, $Usuario, $Codigo, $Validade, $NomeTratado);
  }
  else{
    $stmt = mysqli_prepare($link, "INSERT INTO Entrada(Nome, Validade, DataCad, Descricao, Quantidade, Codigo, Local, QuantidadeInicial, Movimentacao, Usuario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssssississ', $NomeTratado, $Validade, $DataCadastro, $DescricaoTratada, $Quantidade, $Codigo, $Local, $Quantidade, $Movimentacao, $Usuario);
  }

  if(mysqli_stmt_execute($stmt)){
  echo
  "<script>
      alert('Produto inserido com sucesso!');
      window.location.href = '../Home/Entrada.php';
  </script>";
  }
  else{
  echo
    "<script>
      alert('Erro na consulta: . mysqli_error($link)');
    </script>";
  }

  mysqli_stmt_close($stmt);

?>