<?php include_once("../partials/header.php");
include_once("../../config/db.php");
$PesquisaProduto = mysqli_query(
    $conn,
    "SELECT DISTINCT CONCAT(UCASE(LEFT(Nome, 1)), LCASE(SUBSTRING(Nome, 2))) AS Nome, Quantidade FROM Entrada ORDER BY Nome ASC");
$PesquisaDestino = mysqli_query($conn, "SELECT Destino FROM Destino ORDER BY Destino"); 
?>

<section class="conteudo">
    <div class="container-fluid">

        <figure class="text-center">
            <h1>Demanda de Produto</h1>
        </figure>

        <div class="row list-box">
            <div class="col">
                <form action="../Funcoes/FuncaoDemanda.php" method="POST" enctype=multipart/form-data>
                    <div class="row">

                        <div class="col-md-6 text-center">
                            <label for="SeletorProduto" class="form-label"><strong>Selecionar Produto</strong></label>
                            <select class="form-select" data-width="100%" data-size="4" id="SeletorProduto"
                                name="SeletorProduto" data-live-search="true" title="Selecione o produto"
                                onchange="Validade(this.value)" required>
                                <?php
                                while ($row = mysqli_fetch_array($PesquisaProduto)) {
                                    $QuantidadeProduto = mysqli_query($conn, "SELECT SUM(Quantidade) FROM Entrada WHERE Nome = '" . $row['Nome'] . "' ORDER BY Nome ASC");
                                    $qtd = mysqli_fetch_array($QuantidadeProduto);
                                    if ($qtd['SUM(Quantidade)'] == 0) {
                                        echo '<option value="' . $row['Nome'] . '">' . $row['Nome'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Quantidade"><strong>Quantidade</strong></label>
                            <input type="number" class="form-control" id="Quantidade" name="Quantidade"
                                placeholder="Digite a quantidade de demanda" class="form-control" required min="1"
                                max="9999999" oninput="validity.valid||(value='');">
                        </div>

                        <div class="col-md-6 text-center">
                            <label><strong>Destino</strong></label>
                            <select class="form-select" data-width="100%" data-size="4" data-live-search="true"
                                title="Selecione o destino" id="SeletorDestino" name="SeletorDestino"
                                placeholder="Digite o destino do material" required>
                                <option></option>
                                <?php
                                while ($linha3 = mysqli_fetch_array($PesquisaDestino)) {
                                    echo '<option value="' . $linha3['Destino'] . '">' . $linha3['Destino'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Observacao"><strong>Observação</strong></label>
                            <input type="text" name="Observacao" class="form-control" id="Observacao">
                        </div>

                        <div class="col text-center mt-3">
                            <button class="btn btn-primary mr-2" style="background-color: #831D1C"
                                type="submit">Registrar</button>
                            <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once('../partials/footer.php');
?>