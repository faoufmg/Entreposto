<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$row = mysqli_query($conn, "SELECT * from Entrada");

?>

<section class="conteudo-visualizar">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Listagem de Produtos</h1>
    </figure>

    <table id="One" class="table table-striped table-bordered text-center" style="width:100%;">
      <thead class="table-dark">
        <tr>
          <th>Nome</th>
          <th>Validade</th>
          <th>Data de Cadastro</th>
          <th>Descrição</th>
          <th>Quantidade</th>
          <th>Código</th>
          <th>Local</th>
        </tr>
      </thead>

      <tbody>
        <?php
        while ($result = mysqli_fetch_array($row)) {
          echo "<tr>";
          echo "<td>" . mb_convert_case($result['Nome'], MB_CASE_TITLE, 'UTF-8') . "</td>";
          echo "<td>" . date('d/m/Y', strtotime($result['Validade'])) . "</td>";
          echo "<td>" . date('d/m/Y - H:i:s', strtotime($result['DataCad'])) . "</td>";
          echo "<td>" . mb_convert_case($result['Descricao'], MB_CASE_TITLE, 'UTF-8') . "</td>";
          echo "<td>" . $result['Quantidade'] . "</td>";
          echo "<td>" . $result['Codigo'] . "</td>";
          echo "<td>" . mb_convert_case($result['Local'], MB_CASE_TITLE, 'UTF-8') . "</td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>

    <div class="col text-center mt-3">
      <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
    </div>
  </div>
</section>

<?php
include_once('../partials/footer.php');
?>