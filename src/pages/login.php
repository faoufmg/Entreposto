<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Login Radiologia</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="../Imagens/favicon.svg" type="image/x-icon" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/interno/cenex/sistema/public/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../../public/css/reset.css" />
    <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../public/css/css.css" />
    <link rel="stylesheet" href="../../public/css/footer.css" />
    <link rel="stylesheet" href="../../public/css/cabecalho.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg">
            <a class="logo-laranjal">
                <!--<img src="../Imagens/logo-bdhc.png" width="200px" height="auto" alt="Logo BDHC">-->
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                </ul>
            </div>
            <div class="ml-auto"> <!-- Adicionado ml-auto para empurrar a imagem para a direita -->
                <a class="logo-laranjal-fao">
                    <img src="../../public/image/fao_ufmg.png" width="175px" height="auto" alt="Logo FAO">
                </a>
            </div>
        </nav>
    </header>

    <section class="container">

        <div class="row">
            <div class="col text-center">
                <h2 class="h3 mb-5 font-weight-normal">Login <b>Entreposto</b></h2>
            </div>
        </div>

        <div class="content">

            <form action="../models/login.php" method="POST">

                <div class="row list-box">

                    <div class="form-group col-md-12 col-lg-12">
                        <label for="nome"><strong>Nome</strong></label>
                        <input type="text" class="form-control" id="nome_cadastro" name="nome_cadastro" />
                    </div>

                    <div class="form-group col-md-12 col-lg-12">
                        <label for="Senha"><strong>Senha</strong></label>
                        <input type="password" class="form-control" id="senha_cadastro" name="senha_cadastro" />
                    </div>


                    <div class="col text-center mb-4">
                        <button class="btn btn-primary mr-2" type="submit">Entrar</button>
                        <a class="btn btn-danger" href="https://www.odonto.ufmg.br/">Cancelar</a>
                    </div>

                </div>

            </form>

        </div>

    </section>


    <?php
    include_once("../partials/footer.php");
    ?>
</body>

</html>