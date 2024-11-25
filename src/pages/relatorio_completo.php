<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$data_inicio = $_POST['data_inicio'];
$data_fim = $_POST['data_fim'];

$Entrada = mysqli_query($conn, "SELECT * FROM Entrada");

$Saida = mysqli_query($conn, "SELECT * FROM Saida");

$Demanda = mysqli_query($conn, "SELECT * FROM Demanda");

?>

<section class="conteudo-visualizar">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Relatórios</h1>
    </figure>

          <table id="relatorioCompleto" class="table table-striped table-bordered text-center">
            <thead class="table-dark">
              <tr>
                <th>Nome</th>
                <th>Tipo de movimentação</th>
                <th>Origem</th>
                <th>Destino</th>
                <th>Validade</th>
                <th>Quantidade</th>
                <th>Descrição</th>
                <th>Data de Movimentação</th>
                <th>Usuário</th>
              </tr>
            </thead>

            <tbody>
              <?php
              if ($Entrada) {
                while ($iEntrada = mysqli_fetch_array($Entrada)) {
                  echo '<tr>
                  <td>' . $iEntrada['Nome'] . '</td>                           
                  <td style="color:green">' . $iEntrada['Movimentacao'] . '</td>
                  <td>' . $iEntrada['Local'] . '</td>
                  <td></td>
                  <td>' . date("d/m/Y", strtotime($iEntrada['Validade'])) . '</td>
                  <td>' . $iEntrada['QuantidadeInicial'] . '</td>
                  <td>' . $iEntrada['Descricao'] . '</td>                            
                  <td>' . date("d/m/Y", strtotime($iEntrada['DataCad'])) . '</td>
                  <td>' . $iEntrada['Usuario'] . '</td>
                </tr>';
                }
              }

              if ($Saida) {
                while ($iSaida = mysqli_fetch_array($Saida)) {
                  echo '<tr>
                  <td>' . $iSaida['Nome'] . '</td>                           
                  <td style="color:red">' . $iSaida['Movimentacao'] . '</td>
                  <td>' . $iSaida['Local'] . '</td>
                  <td>' . $iSaida['Destino'] . '</td>
                  <td>' . date("d/m/Y", strtotime($iSaida['Validade'])) . '</td>
                  <td>' . $iSaida['Quantidade'] . '</td>
                  <td>' . $iSaida['Descricao'] . '</td>                            
                  <td>' . date("d/m/Y", strtotime($iSaida['DataSaida'])) . '</td>
                  <td>' . $iSaida['Usuario'] . '</td>
                </tr>';
                }
              }

              if ($Demanda) {
                while ($iDemanda = mysqli_fetch_array($Demanda)) {
                  echo '<tr>
                  <td>' . $iDemanda['Nome'] . '</td>                           
                  <td style="color:orange">' . $iDemanda['Movimentacao'] . '</td>
                  <td></td>
                  <td>' . $iDemanda['Destino'] . '</td>
                  <td></td>
                  <td>' . $iDemanda['Quantidade'] . '</td>
                  <td>' . $iDemanda['Descricao'] . '</td>                            
                  <td>' . date("d/m/Y", strtotime($iDemanda['DataDemanda'])) . '</td>
                  <td>' . $iDemanda['Usuario'] . '</td>
                </tr>';
                }
              }
              ?>
            </tbody>
          </table>
          <!-- </div> -->

          <div class="form-row">
            <div class="col text-center mt-3">
              <br>
              <a type="button" class="btn btn-primary" style="background-color: #831D1C" href="relatorio.php">Voltar</a>
            </div>
          </div>

</section>

<?php
include_once('../partials/footer.php');
?>