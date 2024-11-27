<?php 
include_once("../partials/header.php");
include_once("../../config/db.php");
?>

<section class="conteudo">
    <div class="container-fluid">

        <figure class="text-center">
            <h1>Cadastro de Produto</h1>
        </figure>

        <div class="row list-box">
            <div class="col">
                <form action="../models/cadastro_produto.php" method="POST" enctype=multipart/form-data>
                    <div class="row">

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Nome"><strong>Nome</strong></label>
                            <input type="text" name="Nome" placeholder="Digite o nome do produto" class="form-control" id="Nome">
                        </div>
        
                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Descricao"><strong>Descrição</strong></label>
                            <input type="text" name="Descricao" placeholder="Descreva o produto" class="form-control" id="Descricao">
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Local"><strong>Local</strong></label>
                            <input type="text" name="Local" placeholder="Digite o local onde está armazenado" class="form-control" id="Local">
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Codigo"><strong>Código</strong></label>
                            <input type="text" name="Codigo" placeholder="Digite o código do produto" class="form-control" id="Codigo">
                        </div>

                        <div class="row">
                            <div class="col text-center mt-3">
                                <button class="btn btn-primary mr-2" style="background-color: #831D1C"
                                    type="submit">Registrar</button>
                                <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
                            </div>
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