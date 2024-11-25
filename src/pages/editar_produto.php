<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$ProdutoEditar = $_POST['material_edicao'];
$IDProdutoEditar = $_POST['id_edicao'];
$ValidadeProdutoEditar = $_POST['validade_edicao'];
$result = mysqli_query($conn, "SELECT * from Entrada WHERE Nome = '$ProdutoEditar' AND Validade = '$ValidadeProdutoEditar' AND Entrada_id = '$IDProdutoEditar'");
$row = mysqli_fetch_assoc($result);
?>


<section class="conteudo">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Editar</h1>
    </figure>

    <div class="row list-box">
      <div class="col">
        <form action="../models/editar.php" method="POST" enctype="multipart/form-data">
          <div class="row">

            <div class="col-md-1 text-center">
              <label class="form-label" for="ID"><strong>ID</strong></label>
              <input type="text" value="<?php echo $row['Entrada_id']; ?>" name="ID" class="form-control text-center"
                id="ID" readonly>
            </div>

            <div class="col-md-6 text-center">
              <label class="form-label" for="material"><strong>Nome</strong></label>
              <input type="text" value="<?php echo $row['Nome'] ?>" name="material_editado"
                placeholder="Digite o nome do material" class="form-control" id="material_editado" required>
            </div>

            <div class="col-md-5 text-center">
              <label for="codigo"><strong>Código</strong></label>
              <input type="text" value="<?php echo $row['Codigo'] ?>" name="codigo_editado"
                placeholder="Digite o código do material" class="form-control" id="codigo_editado" min="0"
                max="999999999999" required>
            </div>

            <div class="col-md-6 text-center">
              <label for="data_validade"><strong>Validade</strong></label>
              <input type="date" value="<?php echo $row['Validade'] ?>" name="data_validade_editada" class="form-control"
                id="data_validade_editada" required>
            </div>

            <div class="col-md-6 text-center">
              <label class="form-label" for="quantidade"><strong>Quantidade</strong></label>
              <input type="number" value="<?php echo $row['Quantidade'] ?>" name="quantidade_editada"
                placeholder="Digite a quantidade" class="form-control" id="quantidade_editada" min="0" max="999999"
                required>
            </div>

            <div class="col-md-6 text-center">
              <label class="form-label" for="descricao"><strong>Descrição</strong></label>
              <input type="text" value="<?php echo $row['Descricao'] ?>" name="descricao_editada"
                placeholder="Digite a descrição do material" class="form-control" id="descricao_editada">
            </div>

            <div class="col-md-6 text-center">
              <label for="origem"><strong>Local</strong></label>
              <input type="text" value="<?php echo $row['Local'] ?>" name="local_editado"
                placeholder="Digite o local onde se encontra o material" class="form-control" id="local_editado">
            </div>

          </div>

          <div class="col text-center mt-3">
            <button type="submit" class="btn btn-primary mr-2" style="background-color: #831D1C">Salvar</button>
            <a class="btn btn-secondary" href="../pages/editar.php">Voltar</a>
          </div>



        </form>
      </div>
    </div>
  </div>
</section>

<?php
include_once('../partials/footer.php');
?>