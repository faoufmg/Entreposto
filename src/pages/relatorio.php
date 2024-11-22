<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$Entrada = mysqli_query($conn, "SELECT * FROM Entrada");

$Saida = mysqli_query($conn, "SELECT * FROM Saida");

$Demanda = mysqli_query($conn, "SELECT * FROM Demanda");

function Pesquisa()
{
  $data_inicio = $_POST['data_inicio'];
  $data_fim = $_POST['data_fim'];

  $Entrada = mysqli_query($conn, "SELECT * FROM Entrada WHERE DataCad BETWEEN '$data_inicio' AND '$data_fim'");

  $Saida = mysqli_query($conn, "SELECT * FROM Saida WHERE DataSaida BETWEEN '$data_inicio' AND '$data_fim'");

  $Demanda = mysqli_query($conn, "SELECT * FROM Demanda WHERE DataDemanda BETWEEN '$data_inicio' AND '$data_fim'");
  echo '<meta http-equiv="refresh" content="0;URL=../Home/Relatorio.php">';
}
?>

<section class="conteudo">
  <div class="container-fluid">
    <figure class="text-center">
      <h1>Relatórios</h1>
    </figure>
  </div>

  <br>
  <div class="row list-box">
    <div class="col">
      <form action="../Funcoes/RelatorioData.php" method="POST" enctype=multipart/form-data>
        <div class="form-row">
          <div class="col-md-6 col-lg-6">
            <label><strong>Data Início</strong></label>
            <input type="date" name="data_inicio" class="form-control" id="data_inicio">
          </div>
          <div class="col-md-6 col-lg-6">
            <label><strong>Data Fim</strong></label>
            <input type="date" name="data_fim" class="form-control" id="data_fim">
          </div>
        </div>
        <div class="form-row">
          <div class="col text-center mt-3">
            <br>
            <button type="submit" class="btn btn-primary" style="background-color: #831D1C">Pesquisar</button>
            <a type="button" class="btn btn-primary" style="background-color: #831D1C"
              href="../Funcoes/RelatorioCompleto.php">Relatório Completo</a>
            <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
          </div>
        </div>
      </form>
    </div>
  </div>

  </div>
  <br>

</section>

<?php
include_once('../partials/footer.php');
?>