<?php
$nome = getenv("Shib-Person-CommonName");
$cpf = getenv("Shib-brPerson-CPF");
$login = getenv("Shib-Person-UID");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Cadastro de usuário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="/interno/cenex/sistema/public/img/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="../css/reset.css" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/css.css" />
    <link rel="stylesheet" href="../signin.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>
    <section class="container">
        <div class="row">
            <div class="col text-center">
                <img class="mb-4" src="/interno/cenex/sistema/public/img/logo-ntw.svg" alt="" width="auto" height="50">
                <h2 class="h3 mb-5 font-weight-normal">Cadastro <b>Entreposto</b></h2>
            </div>
        </div>

        <div class="row">
            <div class="col text-center">
                <div class="col">
                    <form action="../models/cadastro_usuario.php" method="POST">
                        <div class="row list-box">
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="nome"><strong>Nome</strong></label>
                                <input type="text" class="form-control" id="nome_cadastro" name="nome_cadastro" />
                            </div>
                            <div class="form-group col-md-12 col-lg-12">
                                <label for="cpf"><strong>Senha</strong></label>
                                <input type="password" class="form-control" id="senha_cadastro" name="senha_cadastro" />
                            </div>

                            <div class="col text-center mb-4">
                                <button class="btn btn-primary mr-2" type="submit">Cadastrar</button>
                                <a class="btn btn-danger" href="https://www.odonto.ufmg.br/">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
include_once('../Home/footer.php');
?>